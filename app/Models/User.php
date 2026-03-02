<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Billable, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'firstname', 'lastname',
        'birthdate', 'country', 'gender', 'pronouns', 'avatar_url',
        'avatar_preference', 'xbox_gamertag', 'minecraft_uuid', 'roblox',
        'theme', 'color', 'show_firstname', 'show_lastname', 'show_birthdate',
        'show_age', 'show_gender', 'preferred_language', 'private',
        'permission', 'discord_id', 'has_premium', 'premium_expiration',
        'about_me', 'status', 'lock_status', 'last_status_time'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // -------------------------
    // Static helpers
    // -------------------------

    /**
     * Check if email exists in local_mail field (handles multiple emails separated by ;)
     */
    public static function isMailExist(string $email): bool
    {
        foreach(self::all() as $user) {
            $emails = explode(';', $user->local_mail);
            if (in_array($email, $emails, true)) {
                return true;
            }
        }
        return false;
    }

    // -------------------------
    // Avatar & external info
    // -------------------------

    public function getPicture(): string
    {
        if($this->avatar_preference === 'minecraft' && $this->minecraft_uuid) {
            return 'https://crafthead.net/avatar/' . $this->minecraft_uuid;
        }

        if($this->avatar_url) {
            return $this->avatar_url;
        }

        if($this->minecraft_uuid) {
            return 'https://crafthead.net/avatar/' . $this->minecraft_uuid;
        }

        return '/img/no-avatar.jpg';
    }

    public function getDiscordInfo()
    {
        return $this->discord_id ? DiscordUsers::getUserById($this->discord_id) : null;
    }

    public function getMinecraftInfo(): ?array
    {
        if(!$this->minecraft_uuid) return null;

        $json = @file_get_contents('https://crafthead.net/profile/' . $this->minecraft_uuid);
        if(empty($json)) return null;

        $data = json_decode($json, true);
        return [
            'uuid' => $this->minecraft_uuid,
            'shorten_uuid' => str_replace('-', '', $this->minecraft_uuid),
            'name' => $data['name'] ?? null,
            'full_skin' => 'https://crafthead.net/armor/body/' . $this->minecraft_uuid,
            'avatar' => 'https://crafthead.net/avatar/' . $this->minecraft_uuid,
            'cape' => 'https://crafthead.net/cape/' . $this->minecraft_uuid,
            'bust' => 'https://crafthead.net/bust/' . $this->minecraft_uuid,
            'cube' => 'https://crafthead.net/cube/' . $this->minecraft_uuid,
        ];
    }

    // -------------------------
    // Scopes / helpers
    // -------------------------

    public function scopeAvatar(): string
    {
        if($this->avatar_preference === 'minecraft') {
            $minecraft = $this->getMinecraftInfo();
            if(!empty($minecraft['avatar'])) return $minecraft['avatar'];
        }

        if($this->avatar_preference === 'xbox' && $this->xbox_gamertag) {
            try {
                $url = (env('APP_PROD_URL') ?: env('APP_URL')) . '/api/xbox/' . $this->xbox_gamertag;
                $xboxProfile = json_decode(@file_get_contents($url));
                if($xboxProfile && isset($xboxProfile->data->avatar)) {
                    return $xboxProfile->data->avatar;
                }
            } catch (\Exception) {
                // fallback
            }
        }

        return $this->avatar_url ?: '/img/no-avatar.jpg';
    }

    public function scopeHasDiscordServer(): bool
    {
        $discordUser = DiscordUsers::find($this->discord_id);
        if(!$discordUser) return false;

        return DiscordServerConfig::where('owner_id', $discordUser->discord_id)->exists();
    }

    public function scopeHasPermission(string $slug): bool
    {
        if(!$this->permission) return false;

        $permissions = explode(';', $this->permission);
        return in_array($slug, $permissions, true);
    }
}