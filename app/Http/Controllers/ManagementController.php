<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Modules;
use Carbon\Carbon;
use App\PageLists;
use App\BotActivities;

class ManagementController extends Controller
{
    public function getModules()
    {
        if(PageLists::where('slug', 'modules')->first()->inMaintenance && env('APP_ENV') == 'production') {
            abort(503);
        }
        if (Auth::user()) {
            if (Auth::user()->isAdmin || Auth::user()->isMod || Auth::user()->isDev) {
                $modules = [];
                foreach (Modules::orderBy('Slug')->get() as $key => $module) {
                    array_push($modules, [
                        'slug' => str_replace('_', ' ', $module->Slug),
                        'isInMaintenance' => $module->Maintenance,
                        'isActiveDefault' => $module->isActiveDefault,
                        'icon' => $module->ModuleIcon
                    ]);
                }
                return view('view.management.modules', ['modules' => $modules]);
            }
        }
        abort(403);
    }

    public function getUsers()
    {
        if(PageLists::where('slug', 'users')->first()->inMaintenance && env('APP_ENV') == 'production') {
            abort(503);
        }
        if (Auth::user()) {
            if (Auth::user()->isAdmin || Auth::user()->isMod || Auth::user()->isDev) {
                $users = [];
                foreach (User::orderBy('name')->get() as $key => $user) {
                    $grade = 'member';
                    if ($user->isDev) {
                        $grade = 'developper';
                    }

                    if ($user->isModerator) {
                        $grade = 'moderator';
                    }

                    if ($user->isAdmin) {
                        $grade = 'administrator';
                    }

                    $badges = $user->Badges ? explode(';', $user->Badges) : [];

                    if(Auth::check()) {
                        $isCurrentUser = ($user->id == Auth::user()->id);
                    } else {
                        $isCurrentUser = false;
                    }

                    if ($user->lockStatus === 'online' || $user->status === 'offline') {
                        $state = $user->status;
                    } else {
                        $state = $user->lockStatus;
                    }
                    
                    array_push($users, [
                        'id' => $user->id,
                        'username' => $user->name,
                        'avatarURL' => $user->AvatarURL,
                        'isBOT' => $user->isBOT,
                        'grade' => $grade,
                        'isPremium' => $user->isPremium,
                        'isVerified' => $user->isVerified,
                        'isEmailSubscriber' => $user->isEmailSubscriber,
                        'country' => $user->Country,
                        'discordID' => $user->DiscordID,
                        'discordName' => $user->DiscordName,
                        'discriminator' => $user->Discriminator,
                        'badges' => $badges,
                        'state' => $state,
                        'isCurrentUser' => $isCurrentUser
                    ]);
                }
                return view('view.management.users', [
                    'users' => $users
                ]);
            }
        }
        abort(403);
    }

    public function getBotActivities()
    {
        if(PageLists::where('slug', 'bot_activities')->first()->inMaintenance && env('APP_ENV') == 'production') {
            abort(503);
        }
        if (Auth::user()) {
            if (Auth::user()->isAdmin || Auth::user()->isMod || Auth::user()->isDev) {
                $activities = [];
                foreach (BotActivities::orderBy('ID')->get() as $key => $activity) {
                    array_push($activities, [
                        'name' => str_replace('help |', ' ', $activity->Activity),
                    ]);
                }
                return view('view.management.bot_activities', [
                    'activities' => $activities
                ]);
            }
        }
        abort(403);
    }
}
