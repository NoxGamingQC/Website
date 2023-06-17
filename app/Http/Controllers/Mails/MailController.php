<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
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
                    'mailContent' => $mail,
                    'emailList' => $emailList
            ]);
        }
        abort(403);
    }

    public function show($language, $id) {
        if(Auth::check()) {
            $mail = MailIndex::findOrFail($id);
            $emailList = explode(';', Auth::user()->local_mail);
            $mailsContent =  Mails::where('message_id', $id)->whereIn('recipient', $emailList)->orderBy('created_at', 'desc')->get();
            if(in_array($mail->owner, $emailList)) {
                return view('noxgamingqc.profile.mail')->with([
                    'header' => 'false',
                    'mails' => $mail,
                    'mailsContent' => $mailsContent,
                    'emailList' => $emailList
                ]);
            }
        }
        abort(403);
    }

    public function showContent($language, $id) {
        if(Auth::check()) {
            $emailList = explode(';', Auth::user()->local_mail);
            $mailContent =  Mails::where('id', $id)->whereIn('recipient', $emailList)->get()->first();
            if(in_array($mailContent->recipient, $emailList)) {
                return view('noxgamingqc.profile.mail_content')->with([
                    'header' => 'false',
                    'mailContent' => $mailContent
                ]);
            }
        }
        abort(403);
    }

    public function sendMail(Request $request) {
        if(Auth::check()) {
            $emailList = explode(';', Auth::user()->local_mail);
            if(in_array($request->sender, $emailList)) {
                $data = [
                    'sender' => $request->sender,
                    'recipient' => $request->recipient,
                    'object' => $request->object,
                    'messageContent' => $request->message
                ];

                Mail::send('emails.standard', $data, function($message) use ($data) {
                    $message->from($data['sender'], Auth::user()->name);
                    $message->to($data['recipient']);
                    $message->subject($data['object']);
                });
            }
        }
    }

    public function delete($language, $id) {
        if(Auth::check()) {
            if(Auth::user()->local_mail) {
                if(Auth::user()->local_mail == Mails::findOrFail($id)->recipient) {
                    /*$mail = Mails::findOrFail($id);
                    $mail->delete();

                    return redirect(app()->getLocale() . '/profile/mail');*/
                }
            }
        }
        abort(403);
    }

    public function receive(Request $request) {
        $index = MailIndex::where('owner','=', $request['recipient'])->where('object', 'LIKE', '%'. $request['subject'] .'%')->where('participants', '=', $request['sender'])->get();
        $mail = new Mails();
        if(count(explode('<', (explode('>', $request['sender']))) > 0) {
            $senderEmail = explode('<', (explode('>', $request['sender'])[0]))[1];
        } else {
            $senderEmail = $request['sender'];
        }
        if(count($index) == 0) {
            $index = new MailIndex();
            $index->owner = $request['recipient'];
            $index->object = $request['subject'];
            $index->participants = $senderEmail;
            $index->save();
            $mail->message_id = $index->id;
        } else {
            $mail->message_id = $index->first()->id;
        }


        $mail->sender = $senderEmail;
        $mail->recipient = $request['recipient'];
        $mail->sender_name = explode('<', $request['from'])[0];
        $mail->object = $request['subject'];
        $mail->text = $request['body-plain'];
        $mail->html = $request['body-html'];
        //$mail->request = $request;
        $mail->save();
    }
}