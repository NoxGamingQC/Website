<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Modules;
use App\BotActivities;

class ManagementController extends Controller
{
    public function getModules()
    {
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
                return view('management.modules', ['modules' => $modules]);
            }
        }
        abort(403);
    }

    public function getUsers()
    {
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
                    
                    array_push($users, [
                        'username' => $user->name,
                        'avatarURL' => $user->avatarURL,
                        'isBOT' => $user->isBOT,
                        'grade' => $grade
                    ]);
                }
                return view('management.users', [
                    'users' => $users
                ]);
            }
        }
        abort(403);
    }

    public function getBotActivities()
    {
        if (Auth::user()) {
            if (Auth::user()->isAdmin || Auth::user()->isMod || Auth::user()->isDev) {
                $activities = [];
                foreach (BotActivities::orderBy('ID')->get() as $key => $activity) {
                    array_push($activities, [
                        'name' => str_replace('help |', ' ', $activity->Activity),
                    ]);
                }
                return view('management.bot_activities', [
                    'activities' => $activities
                ]);
            }
        }
        abort(403);
    }
}
