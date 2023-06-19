<?php

namespace App\Http\Controllers\Projects;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MinecraftController extends Controller
{
    public function index()
    {
        abort(503);
        return view('view.about_us.projects.minecraft');
    }
}