<?php

namespace App\Http\Controllers\NGST;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kiosk;
use App\User;
use Carbon\Carbon;

class KioskController extends Controller
{
    public function index($slug)
    {
        $kiosk = Kiosk::where('Company', $slug)->join('users', 'users.id', '=', 'kiosk.UserID')->orderBy('kiosk.created_at', 'DESC')
        ->take(6)->get(['kiosk.Company', 'users.Firstname', 'users.Lastname', 'users.AvatarURL', 'kiosk.created_at']);
        Carbon::setLocale('fr');
        foreach($kiosk as $key => $value) {
            $value->time = Carbon::parse($value->created_at)->diffForHumans();
        }
        Carbon::setLocale('en');
        return view('ngst.kiosk.' . $slug)->with([
            'kiosk' => $kiosk
        ]);
    }
}