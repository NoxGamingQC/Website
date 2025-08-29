<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\PageLists;

class BotCommandsController extends Controller
{
    public function index()
    {
        return view('commands');
    }
}