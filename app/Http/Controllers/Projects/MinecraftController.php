<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;

class MinecraftController extends Controller
{
    public function index()
    {
        abort(503);
        return view('view.about_us.projects.minecraft');
    }
}