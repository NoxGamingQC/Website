<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Model\PageLists;

class ContactController extends Controller
{
    public function index()
    {
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
            'to_name' => $toName,
            'to_mail' => $toEmail
        ];
        if($name !== "" && preg_match($email_regex,$email) && $message !== "") {
            Mail::send('emails.contact_us', $data, function($message) {
                $message->from('noreply@noxgamingqc.ca', 'NoxGamingQC');
                $message->to('jbedard@noxgamingqc.ca');
                $message->subject('You receive a new message');
                //$message->header('List-Unsubscribe', '<https://www.noxgamingqc.ca/unsubscribe?mail=jbedard@noxgamingqc.ca>');
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
