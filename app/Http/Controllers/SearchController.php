<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
    public function index($locale, $id)
    {

    }

    public function search(Request $request)
    {
        $user = User::all();
        
        $search = $request->get('search');
        
        $users = User::where('name', 'ilike', '%' . $search . '%')->take(10)
        ->orderBy('name')->get();

        $userList = [];

        foreach ($users as $user) {
            if ($user->is_management) {
                $grade = "management";
            } 

            array_push($userList, [
                'id' => $user->id,
                'username' => $user->name,
                'grade' => $user->grade,
                'avatarURL' => $user->avatar_url
            ]);
        }

        return response()->json($userList);
    }
}