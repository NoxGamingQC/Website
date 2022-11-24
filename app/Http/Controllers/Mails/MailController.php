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
        $mailParser = new MailMimeParser();
        
        $mail = new Mails();
        
        $message = $mailParser->parse(urldecode($request), true);

        $mail->object = explode('&', explode('Subject=', $message)[1])[0];
        $mail->sender_name = explode('<', explode('&', preg_split('/&From=/', $mail->request)[1])[0])[0];
        $mail->sender = explode('>', explode('<', explode('&', preg_split('/&From=/', $mail->request)[1])[0])[1])[0];

        
        $mail->recipient = explode('>', explode('<', explode('&', preg_split('/&To=/', $mail->request)[1])[0])[1])[0];
        $mail->message = explode('&', explode('body-plain=', $message)[1])[0];
        $mail->content_type = $message->getHeaderValue('Content-Type');
        $mail->request = $message;
        $mail->save();
    }
}