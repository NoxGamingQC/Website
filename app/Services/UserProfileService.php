<?php

namespace App\Services;

use App\Models\User;
use App\Models\DiscordUsers;
use App\Models\Points;
use App\Models\API\ApiKey;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use cebe\markdown\GithubMarkdown;
use GuzzleHttp\Client;

class UserProfileService
{
    protected AvatarService $avatarService;
    protected MinecraftService $minecraftService;
    protected DiscordService $discordService;
    protected RobloxService $robloxService;

    public function __construct(
        AvatarService $avatarService,
        MinecraftService $minecraftService,
        DiscordService $discordService,
        RobloxService $robloxService
    ) {
        $this->avatarService = $avatarService;
        $this->minecraftService = $minecraftService;
        $this->discordService = $discordService;
        $this->robloxService = $robloxService;
    }

    /**
     * Find a user by ID or username (case-insensitive)
     */
    public function findUserByIdOrName(string $id): ?User
    {
        $user = User::whereRaw('LOWER(name) = ?', [strtolower($id)])->first();

        if (!$user && is_numeric($id)) {
            $user = User::find($id);
        }

        return $user;
    }

    /**
     * Check if the authenticated user can view the profile
     */
    public function canView(User $user, ?User $currentUser): bool
    {
        if (!$user->private) return true;

        if (!$currentUser) return false;

        return $currentUser->id === $user->id || $currentUser->is_management;
    }

    /**
     * Prepare profile data for the view
     */
    public function getProfileData(User $user): array
    {
        $firstname = $user->show_firstname ? $user->firstname : null;
        $lastname = $user->show_lastname ? $user->lastname : null;
        $age = $user->show_age ? Carbon::parse($user->birthdate)->age : null;
        $birthdate = $user->show_birthdate ? $user->birthdate : null;
        $grade = $user->is_management ? "management_team" : "member";
        $xboxProfile = $this->avatarService->getAvatar($user);
        $robloxProfile = $this->robloxService->getProfile($user);
        $badges = $user->badges ? explode(';', $user->badges) : [];
        $points = Points::getPointsLogs($user->id, 10);
        $pointCount = Points::getTotalPoints($user->id);

        if($user->premium_expiration === 'lifetime') {
            $premiumTime = 'lifetime';
        } elseif($user->premium_expiration == null) {
            $premiumTime = null;
        } else {
            $premiumTime = $user->premium_expiration;
        }

        $gender = null;
        if ($user->show_gender && $user->gender !== null) {
            $gender = match($user->gender) {
                0 => 'Other',
                1 => 'Male',
                2 => 'Female',
                default => null,
            };
        }

        $isCurrentUser = Auth::check() && $user->id === Auth::user()->id;

        $state = ($user->lock_status === 'online' || $user->status === 'offline')
            ? $user->status
            : $user->lock_status;

        $aboutMeContent = $this->parseAboutMe($user, $xboxProfile);

        return [
            "user" => $user,
            "id" => $user->id,
            "username" => $user->name,
            "grade" => $grade,
            "isPremium" => $user->has_premium,
            "language" => $user->language,
            "badges" => $badges,
            "premiumTime" => $premiumTime,
            "avatarURL" => $this->avatarService->getAvatar($user),
            "firstname" => $firstname,
            "lastname" => $lastname,
            "age" => $age,
            "gender" => $gender,
            "birthdate" => $birthdate,
            "country" => $user->country,
            "pointCount" => $pointCount,
            "points" => $points,
            "state" => $state,
            "isCurrentUser" => $isCurrentUser,
            "currentTab" => $isCurrentUser ? 'user' : '',
            "currentPage" => $isCurrentUser ? 'my-profile' : '',
            "aboutMe" => $aboutMeContent,
            "minecraft" => $this->minecraftService->getInfo($user),
            "discordUser" => $this->discordService->getUserInfo($user),
            "pronouns" => $user->pronouns,
            "xbox_profile" => $xboxProfile,
            "header" => false,
        ];
    }

    /**
     * Update user profile with request data
     */
    public function updateProfile(User $user, array $data): void
    {
        $fields = [
            'name', 'firstname', 'lastname', 'birthdate', 'country', 'gender',
            'pronouns', 'about_me', 'xbox_gamertag', 'minecraft_uuid', 'roblox',
            'theme', 'color', 'show_firstname', 'show_lastname', 'show_birthdate',
            'show_age', 'show_gender', 'preferred_language', 'avatar_url', 'avatar_preference'
        ];

        foreach($fields as $field) {
            if(isset($data[$field])) {
                $user->$field = $data[$field];
            }
        }

        $user->save();
    }

    /**
     * Update user state
     */
    public function updateState(User $user, string $state): bool
    {
        if($state === 'offline') sleep(45);

        if($user->status != $state) {
            $user->status = $state;
            $user->last_status_time = Carbon::now();
            $user->save();
        }

        return $user->lock_status !== 'online';
    }

    /**
     * Link Discord account
     */
    public function linkDiscord(User $user, string $linkToken): bool
    {
        return $this->discordService->linkDiscord($user, $linkToken);
    }

    /**
     * Generate API link token
     */
    public function generateLinkToken(string $platform, string $websiteToken, ?string $discordId = null): string
    {
        $app = ApiKey::where('key', $websiteToken)->firstOrFail();
        $key = Str::random(128);

        if($platform === 'discord' && $discordId) {
            $discordUser = DiscordUsers::where('discord_id', trim($discordId))->first();
            if($discordUser) {
                $discordUser->linking_token = $key;
                $discordUser->save();
            }
        }

        return $key;
    }

    /**
     * Parse About Me field (Markdown or fallback)
     */
    protected function parseAboutMe(User $user, $xboxProfile = null): ?string
    {
        if(!$user->about_me) {
            return $xboxProfile && $xboxProfile->data->bio
                ? '<p>' . $xboxProfile->data->bio . '</p>'
                : null;
        }

        try {
            $parser = new GithubMarkdown();
            $raw = file_get_contents($user->about_me);
            return $parser->parse($raw);
        } catch (\Exception) {
            return $user->about_me;
        }
    }
}