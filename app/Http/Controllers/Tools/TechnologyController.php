<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Model\PageLists;

class TechnologyController extends Controller
{
    public function demounit()
    {
        return view('view.tools.demo-unit')->with([
            'currentPage' => "demo-unit-budget",
            'currentTab' => 'tools'
        ]);
    }
}