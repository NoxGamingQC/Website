<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ProjectsController extends Controller
{
    /**
     * Display the projects page.
     *
     * @return View
     */
    public function index(): View
    {
        return view('projects.index')->with([
            'currentPage' => 'projects',
        ]);
    }
}