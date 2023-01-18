<?php

namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactUsEmail(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $message = $request->message;
        $email_regex = '^[\w-]+@+([\w-]+\.)+[\w-]{2,4}^';
        $data = [
            'name' => $name,
            'email' => $email,
            'message_content' => $message,
        ];
        if($name !== "" && preg_match($email_regex, $email) && $message !== "") {
            Mail::send('emails.gouliram.contact_us', $data, function($message) {
                $message->from('noreply@gouliram.com', 'Gouliram productions');
                $message->to('contact@gouliram.com');
                $message->subject('Un message requiert votre attention');
            });
        } else {
            abort(403);
        }
    }
}