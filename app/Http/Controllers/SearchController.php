<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

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
            if ($user->isAdmin) {
                $grade = "administrator";
            } elseif ($user->isModerator) {
                $grade = "moderator";
            } elseif ($user->isDev) {
                $grade = "developper";
            }

            array_push($userList, [
                'id' => $user->id,
                'username' => $user->name,
                'grade' => $user->grade,
                'avatarURL' => $user->AvatarURL
            ]);
        }

        return response()->json($userList);
    }
}