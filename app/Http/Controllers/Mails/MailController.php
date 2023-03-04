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
            $mail = [];
            $emailList = explode(';', Auth::user()->local_mail);
            $mails = MailIndex::whereIn('owner', $emailList)
                        ->orderBy('created_at', 'desc')
                        ->get();

            foreach($mails as $key => $value) {
                $mail[$value->id] =  Mails::where('message_id', $value->id)->whereIn('recipient', $emailList)->get()->first();
            }
                
            return view('noxgamingqc.profile.mails')->with([
                    'mails' => $mails,
                    'mailContent' => $mail
            ]);
        }
        abort(403);
    }

    public function show($language, $id) {
        if(Auth::check()) {
            $mail = Mails::findOrFail($id);
            $emailList = explode(';', Auth::user()->local_mail);
            if(in_array($mail->recipient, $emailList)) {
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
            $mail = Mails::findOrFail($id);
            $emailList = explode(';', Auth::user()->local_mail);
            if(in_array($mail->recipient, $emailList)) {
                return view('noxgamingqc.profile.mail')->with([
                    'mail' => $mail
                ]);
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