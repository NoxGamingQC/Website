<?php

namespace App\Http\Controllers;

use App;
use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PageLists;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        if(PageLists::where('slug', 'contact_us')->first()->inMaintenance && env('APP_ENV') === 'production') {
            if(Auth::check()) {
                if(Auth::user()->isAdmin || Auth::user()->isModerator || Auth::user()->isDev) {
                    return view('contact');
                }
            }
            abort(503);
        }
        return view('view.about_us.contact');
    }

    public function sendContactUsEmail(Request $request)
    {
        $name = $request->name;
        $toEmail = 'jbedard@noxgamingqc.ca';
        $toName = 'Jimmy';
        $email = $request->email;
        $object = $request->object ? $request->object : '';
        $message = $request->message;
        $language = App::getLocale();
        $email_regex = '^[\w-]+@+([\w-]+\.)+[\w-]{2,4}^';
        $data = [
            'name' => $name,
            'email' => $email,
            'object' => $object,
            'contactMessage' => $message,
            'language' => $language,
            'to'=> 'NoxGamingQC',
            'to_name' => 'Jimmy Bédard'
        ];
        if($name !== "" && preg_match($email_regex,$email) && $message !== "") {
            Mail::send('emails.contact_us', $data, function($message) {
                $message->from('noreply@noxgamingqc.ca', 'NoxGamingQC');
                $message->to('jbedard@noxgamingqc.ca');
                $message->subject('You received a new message');
            });
            Mail::send('emails.contact_us', $data, function($message) {
                $message->from('noreply@noxgamingqc.ca', 'NoxGamingQC');
                $message->to('noxgamingqc@gmail.com');
                $message->subject('You received a new message');
            });

            $text = 'Hey, you received mail from your website.';
                Mail::send('emails.text_message', ['text' => $text], function($message) {
                    $message->from('noreply@noxgamingqc.ca', 'NoxGamingQC');
                    $message->to(env('TXT_ALERT_EMAIL'));
                });
        } else {
            abort(403);
        }
    }
}