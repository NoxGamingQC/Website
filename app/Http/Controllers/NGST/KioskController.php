<?php

namespace App\Http\Controllers\NGST;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kiosk;
use App\Companies;
use Carbon\Carbon;

class KioskController extends Controller
{
    public function index($id)
    {
        return view('ngst.kiosk.recipe_list');
        $company = Companies::find($id)->first();
        $kiosk = Kiosk::where('Company', $id)->join('users', 'users.id', '=', 'kiosk.UserID')->orderBy('kiosk.created_at', 'DESC')
        ->take(6)->get(['kiosk.Company', 'users.Firstname', 'users.Lastname', 'users.AvatarURL', 'kiosk.created_at']);
        Carbon::setLocale($company->language);
        foreach($kiosk as $key => $value) {
            $value->time = Carbon::parse($value->created_at)->diffForHumans();
        }
        Carbon::setLocale('en');
        return view('ngst.kiosk.main')->with([
            'kiosk' => $kiosk,
            'company' => $company
        ]);
    }

    public function recipeList() {
        return view('ngst.kiosk.recipe_list');
    }

    public function recipe($slug) {
        return view('ngst.kiosk.recipe.'. $slug);
    }

    public function refreshData($id)
    {
        $company = Companies::find($id)->first();
        $kiosk = Kiosk::where('Company', $id)->join('users', 'users.id', '=', 'kiosk.UserID')->orderBy('kiosk.created_at', 'DESC')
        ->take(6)->get(['kiosk.Company', 'users.Firstname', 'users.Lastname', 'users.AvatarURL', 'kiosk.created_at']);
        Carbon::setLocale($company->language);
        foreach($kiosk as $key => $value) {
            $value->time = Carbon::parse($value->created_at)->diffForHumans();
        }
        Carbon::setLocale('en');
        return response()->json([
            'kiosk' => $kiosk,
            'company' => $company
        ]);
    }
}