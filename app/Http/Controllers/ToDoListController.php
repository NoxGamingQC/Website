<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ToDoList;

class ToDoListController extends Controller
{
    public function index(Request $request)
    {
        $tasks = ToDoList::all();
        $pendingTasks = ToDoList::where('status', 'pending')->get();
        $completedTasks = ToDoList::where('status', 'completed')->get();
        $inProgressTasks = ToDoList::where('status', 'in_progress')->get();
        $flags = [];
        foreach($tasks as $key => $task) {
            $flags[$task->id] = $task->getFlags();
        }
        return view('management.todolist', [
            'tasks' => $tasks,
            'pendingTasks'=> $pendingTasks,
            'completedTasks'=> $completedTasks,
            'inProgressTasks'=> $inProgressTasks,
            'flags' => $flags
        ]);
    }
}