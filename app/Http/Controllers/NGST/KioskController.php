<?php

namespace App\Http\Controllers\NGST;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KioskController extends Controller
{
    public function getFusee()
    {

        return view('ngst.kiosk.fusee');
    }
}