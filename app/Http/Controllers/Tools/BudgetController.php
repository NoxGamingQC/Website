<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Model\PageLists;

class BudgetController extends Controller
{
    public function index()
    {
        return view('view.tools.mensual_budget')->with([
            'currentPage' => "mensual-budget",
            'currentTab' => 'tools'
        ]);
    }
}