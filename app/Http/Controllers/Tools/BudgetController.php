<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class BudgetController extends Controller
{
    /**
     * Display the mensual budget page.
     *
     * @return View
     */
    public function index(): View
    {
        return view('tools.mensual_budget')->with([
            'currentPage' => 'mensual-budget',
            'currentTab' => 'tools',
        ]);
    }
}