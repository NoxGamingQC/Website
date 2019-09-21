<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Modules;

class ManagementController extends Controller
{
    public function getModules()
    {
        if (Auth::user()) {
            if (Auth::user()->isAdmin || Auth::user()->isMod || Auth::user()->isDev) {
                $modules = [];
                foreach (Modules::all() as $key => $module) {
                    array_push($modules, [
                        'slug' => str_replace('_', ' ', $module->Slug),
                        'isInMaintenance' => $module->Maintenance,
                        'isActiveDefault' => $module->isActiveDefault
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
                return view('management.users', [
                ]);
            }
        }
        abort(403);
    }

    public function getBotActivities()
    {
        if (Auth::user()) {
            if (Auth::user()->isAdmin || Auth::user()->isMod || Auth::user()->isDev) {
                return view('management.bot_activities', [
                ]);
            }
        }
        abort(403);
    }
}
