<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Laravel\Cashier\Cashier;


class StoreController extends Controller
{
    public function index()
    {
        $user = Cashier::findBillable(Auth::user()->stripe_id);

        dd($user);
        return view('pages.store')->with([
            'currentPage' => 'store'
        ]);
    }
}