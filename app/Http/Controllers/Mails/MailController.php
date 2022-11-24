<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ZBateson\MailMimeParser\MailMimeParser;
use ZBateson\MailMimeParser\Message;
use ZBateson\MailMimeParser\Header\HeaderConsts;
use App\Mails;
use Auth;

class MailController extends Controller
{
    public function index() {
        if(Auth::check()) {
            if(Auth::user()->local_mail) {
                $mails = Mails::where('recipient', Auth::user()->local_mail)->orderBy('created_at', 'desc')->get();
                return view('noxgamingqc.profile.mails')->with(['mails' => $mails]);
            }
        }
        abort(403);
    }

    public function show($language, $id) {
        if(Auth::check()) {
            if(Auth::user()->local_mail) {
                if(Auth::user()->local_mail == Mails::findOrFail($id)->recipient) {
                    $mail = Mails::findOrFail($id);
                    return view('noxgamingqc.profile.mail')->with(['mail' => $mail]);
                }
            }
        }
        abort(403);
    }

    public function delete($language, $id) {
        if(Auth::check()) {
            if(Auth::user()->local_mail) {
                if(Auth::user()->local_mail == Mails::findOrFail($id)->recipient) {
                    $mail = Mails::findOrFail($id);
                    $mail->delete();

                    return redirect()->back();
                }
            }
        }
        abort(403);
    }

    public function receive(Request $request) {
        
        $mail = new Mails();
        
        //$mail->sender_name = explode('<', explode('&', preg_split('/&From=/', $message)[1])[0])[0];
        $mail->sender = $request['sender'];
        $mail->recipient = $request['recipient'];
        $mail->recipient_name = $request['recipient_name'];
        $mail->object = $request['subject'];
        $mail->text = $request['body-plain'];
        $mail->html = $request['body-html'];
        $mail->content_type = $request['Content-Type'];
        $mail->request = $request;
        $mail->save();
    }
}