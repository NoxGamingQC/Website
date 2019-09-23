<?php

namespace App\Http\Controllers\NoxBOT;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules;

class BotModulesController extends Controller
{
    public function getModules()
    {
        $modules = [];
        foreach (Modules::orderBy('Slug')->get() as $key => $module) {
            array_push($modules, [
                'slug' => $module->Slug,
                'isInMaintenance' => $module->Maintenance,
                'isActiveDefault' => $module->isActiveDefault,
                'icon' => $module->ModuleIcon,
                'name' => $module->Name,
                'description' => $module->Description
            ]);
        }
        return response()->json($modules);
    }
}
