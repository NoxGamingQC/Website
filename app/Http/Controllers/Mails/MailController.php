<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ZBateson\MailMimeParser\MailMimeParser;
use ZBateson\MailMimeParser\Message;
use ZBateson\MailMimeParser\Header\HeaderConsts;
use App\Mails;
use App\MailIndex;
use Auth;

class MailController extends Controller
{
    public function index() {
        if(Auth::check()) {
            $mails = null;
            $emailList = explode(';', Auth::user()->local_mail);
            /*[
                'admin@noxgamingqc.ca',
                'info@noxgamingqc.ca',
                'nox@noxgamingqc.ca'
            ]*/
            $mails = Mails::whereIn('recipient', $emailList)
                        ->orderBy('created_at', 'desc')
                        ->get();
                
            return view('noxgamingqc.profile.mails')->with(['mails' => $mails]);
        }
        abort(403);
    }

    public function show($language, $id) {
        if(Auth::check()) {
            if(Auth::user()->local_mail) {
                if(Auth::user()->isAdmin) {
                    $mail = Mails::findOrFail($id);
                    if(!$mail->seen) {
                        $mail->seen = true;
                    }
                    $mail->save();
                    return view('noxgamingqc.profile.mail')->with([
                        'header' => 'false',
                        'mail' => $mail
                    ]);
                } else {
                    $mail = Mails::findOrFail($id);
                    if(Auth::user()->local_mail == $mail->recipient) {
                        if(!$mail->seen) {
                            $mail->seen = true;
                        }
                        $mail->save();
                        return view('noxgamingqc.profile.mail')->with([
                            'header' => 'false',
                            'mail' => $mail
                        ]);
                    }
                    abort(403);
                }
            } else if(Auth::user()->isAdmin) {
                $mail = Mails::findOrFail($id);
                if(!$mail->seen) {
                    $mail->seen = true;
                }
                $mail->save();
                return view('noxgamingqc.profile.mail')->with([
                    'header' => 'false',
                    'mail' => $mail
                ]);
            }
        }
        abort(403);
    }

    public function showContent($language, $id) {
        if(Auth::check()) {
            if(Auth::user()->local_mail) {
                if(Auth::user()->isAdmin) {
                    $mail = Mails::findOrFail($id);
                    return view('noxgamingqc.profile.mail_content')->with([
                        'mail' => $mail
                    ]);
                } else {
                    $mail = Mails::findOrFail($id);
                    if(Auth::user()->local_mail == $mail->recipient) {
                        return view('noxgamingqc.profile.mail_content')->with([
                            'mail' => $mail
                        ]);
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
        $index = MailIndex::where('owner','=', $request['recipient'])->where('object', 'LIKE', '%'. $request['subject'] .'%')->where('participants', '=', $request['sender'])->get();
        $mail = new Mails();
        if(count($index) == 0) {
            $index = new MailIndex();
            $index->owner = $request['recipient'];
            $index->object = $request['subject'];
            $index->participants = $request['sender'];
            $index->save();
            $mail->message_id = $index->id;
        } else {
            $mail->message_id = $index->first()->id;
        }

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