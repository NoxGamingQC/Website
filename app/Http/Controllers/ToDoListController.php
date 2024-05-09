<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            if (Auth::user()->is_management) {
                abort(503);
                return view('view.management.todolist');
            }
        }
        abort(403);
    }
}