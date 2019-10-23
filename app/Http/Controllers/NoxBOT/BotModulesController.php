<?php

namespace App\Http\Controllers\NoxBOT;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules;
use App\SubsModules;

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

    public function getSubsModules()
    {
        $subModuleList = [];
        foreach (SubsModules::orderBy('Slug')->get() as $key => $subModule) {
            $module = Modules::where('ID', $subModule->ModuleID)->first();
            array_push($subModuleList, [
                'slug' => $subModule->Slug,
                'name' => $subModule->Name,
                'module'=> $module->Name,
                'isInMaintenance' => $module->Maintenance,
            ]);
        }
        return response()->json($subModuleList);
    }
}
