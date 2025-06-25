<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\PageLists;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('view.projects');
    }
}