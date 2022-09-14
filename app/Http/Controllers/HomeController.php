<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
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
                $message->to('jbedard@noxgamingqc.ca');
                $message->subject('You received a new message');
            });
        } else {
            abort(403);
        }
    }
}
