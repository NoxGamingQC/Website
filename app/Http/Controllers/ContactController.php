<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PageLists;

class ContactController extends Controller
{
    public function index()
    {
        if(PageLists::where('slug', 'contact_us')->first()->inMaintenance && env('APP_ENV') == 'production') {
            abort(503);
        }
        return view('contact');
    }

    public function sendContactUsEmail(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $object = $request->object ? $request->object : '';
        $message = $request->message;
        $language = App::getLocale();
        $data = [
            'name' => $name,
            'email' => $email,
            'object' => $object,
            'contactMessage' => $message,
            'language' => $language
        ];
        if($name !== "" && $email !== "" && $message !== "") {
            Mail::send('emails.contact_us', $data, function($message) {
                $message->from('website@noxgamingqc.ca', 'Website');
                $message->to('nox@noxgamingqc.ca');
                $message->subject('You received a new message');
            });
        } else {
            abort(403);
        }
    }
}