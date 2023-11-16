<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\NoxBOT\BotActivities;
use App\Model\PageLists;
use App\Model\NoxBOT\Modules;
use App\Model\User;
use DB;

class ManagementController extends Controller
{
    public function getModules()
    {
        if(PageLists::where('slug', 'modules')->first()->inMaintenance && env('APP_ENV') == 'production') {
            abort(503);
        }
        if (Auth::user()) {
            if (Auth::user()->is_management) {
                $modules = [];
                foreach (Modules::orderBy('slug')->get() as $key => $module) {
                    array_push($modules, [
                        'slug' => str_replace('_', ' ', $module->slug),
                        'isInMaintenance' => $module->in_maintenance,
                        'icon' => $module->module_icon
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
            if (Auth::user()->is_management) {
                $users = [];
                foreach (User::orderBy('name')->get() as $key => $user) {
                    $grade = 'member';
                    if ($user->is_management) {
                        $grade = 'management';
                    }

                    $badges = $user->badges ? explode(';', $user->badges) : [];

                    if(Auth::check()) {
                        $isCurrentUser = ($user->id == Auth::user()->id);
                    } else {
                        $isCurrentUser = false;
                    }

                    if ($user->lock_status === 'online' || $user->status === 'offline') {
                        $state = $user->status;
                    } else {
                        $state = $user->lock_status;
                    }
                    
                    array_push($users, [
                        'id' => $user->id,
                        'username' => $user->name,
                        'avatarURL' => $user->avatar_url,
                        'grade' => $grade,
                        'isPremium' => $user->has_premium,
                        'isVerified' => $user->is_verified,
                        'isEmailSubscriber' => $user->is_email_subscriber,
                        'country' => $user->country,
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
        if(PageLists::where('slug', 'bot_activities')->first()->in_maintenance && env('APP_ENV') == 'production') {
            abort(503);
        }
        if (Auth::user()) {
            if (Auth::user()->is_management) {
                $activities = [];
                foreach (BotActivities::orderBy('id')->get() as $key => $activity) {
                    array_push($activities, [
                        'name' => $activity->activity,
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
