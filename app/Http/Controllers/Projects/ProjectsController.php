<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\XboxGamercard;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('projects.index')->with([
            'currentPage' => 'projects'
        ]);
    }
}