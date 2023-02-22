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

    public function cookbook() {
        return view('ngst.kiosk.cookbook')->with([
            'kiosk' => 'true',
            'recipe' => 'true',
            'isRecipe' => false,
            'isButtonLastPage' => 'false'
        ]);
    }

    public function cookbookCategory($language, $slug) {
        return view('ngst.kiosk.cookbook.'. $slug)->with([
            'kiosk' => 'true',
            'recipe' => 'true',
            'isRecipe' => false,
            'lastLink' => '/' . app()->getLocale() . '/kiosk/cookbook',
        ]);
    }

    public function recipe($language, $category ,$slug) {
        return view('ngst.kiosk.cookbook.recipe.' . $category . '.' . $slug)->with([
            'kiosk' => 'true',
            'recipe' => 'true',
            'isRecipe' => true,
            'lastLink' => '/' . app()->getLocale() . '/kiosk/cookbook/' . $category,
        ]);
    }

    public function refreshData($id)
    {
        if(isset($id)) {
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
        } else {
            return view('ngst.kiosk.recipe_list');
        }
    }
}