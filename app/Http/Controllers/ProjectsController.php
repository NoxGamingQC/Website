<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\PageLists;

class ProjectsController extends Controller
{
    public function index()
    {
        if(PageLists::where('slug', 'projects')->first()->inMaintenance && env('APP_ENV') === 'production') {
            if(Auth::check()) {
                if(Auth::user()->is_management) {
                    return view('view.about_us.projects');
                }
            }
            abort(503);
        }
        return view('view.about_us.projects');
    }
}