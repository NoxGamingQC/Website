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
                $mails = Mails::where('recipient', Auth::user()->local_mail)->get();
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
        
        $message = $mailParser->parse($request, true);
        $mail->object = $message->getHeaderValue('Subject');
        $mail->sender = $message->getHeaderValue('From');
        $mail->recipient = $message->getHeaderValue('To');
        //$mail->message = $message->getHtmlContent() ? $message->getHtmlContent() : $message->getTextContent();
        $mail->message = $message;
        $mail->content_type = $message->getHeaderValue('Content-Type');;
        $mail->save();
    }
}