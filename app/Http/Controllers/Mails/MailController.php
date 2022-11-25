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
            $mails = null;
            if(Auth::user()->local_mail) {
                if(Auth::user()->isAdmin) {
                    $mails = Mails::where('recipient', Auth::user()->local_mail)
                                    ->orWhere('recipient', 'admin@noxgamingqc.ca')
                                    ->orWhere('recipient', 'nox@noxgamingqc.ca')
                                    ->orWhere('recipient', 'info@noxgamingqc.ca')
                                    ->orderBy('created_at', 'desc')
                                    ->get();
                } else {
                    $mails = Mails::where('recipient', Auth::user()->local_mail)
                                    ->orderBy('created_at', 'desc')
                                    ->get();
                }
                return view('noxgamingqc.profile.mails')->with(['mails' => $mails]);
            } else if(Auth::user()->isAdmin) {
                $mails = Mails::where('recipient', 'admin@noxgamingqc.ca')
                                ->orWhere('recipient', 'nox@noxgamingqc.ca')
                                ->orWhere('recipient', 'info@noxgamingqc.ca')
                                ->orderBy('created_at', 'desc')
                                ->get();
            }
        }
        abort(403);
    }

    public function show($language, $id) {
        if(Auth::check()) {
            if(Auth::user()->local_mail) {
                if(Auth::user()->isAdmin) {
                    $mail = Mails::findOrFail($id);
                    return view('noxgamingqc.profile.mail')->with(['mail' => $mail]);
                } else {
                    $mail = Mails::findOrFail($id);
                    if(Auth::user()->local_mail == $mail->recipient) {
                        return view('noxgamingqc.profile.mail')->with(['mail' => $mail]);
                    }
                    abort(403);
                }
            } else if(Auth::user()->isAdmin) {
                $mail = Mails::findOrFail($id);
                return view('noxgamingqc.profile.mail')->with(['mail' => $mail]);
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

                    return redirect(app()->getLocale() . '/profile/mail');
                }
            }
        }
        abort(403);
    }

    public function receive(Request $request) {
        
        $mail = new Mails();
        
        $mail->sender = $request['sender'];
        $mail->recipient = $request['recipient'];
        $mail->sender_name = explode('<', $request['from'])[0];
        $mail->object = $request['subject'];
        $mail->text = $request['body-plain'];
        $mail->html = $request['body-html'];
        $mail->request = $request;
        $mail->save();
    }
}