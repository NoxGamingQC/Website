<?php

namespace App\Http\Controllers\Mails;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Model\Mails;
use App\Model\MailIndex;
use App\Model\User;
use Webklex\PHPIMAP\ClientManager;
use Webklex\PHPIMAP\Client;
use Illuminate\Support\Facades\Session;

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

            $userEmailsList = explode(';', Auth::user()->local_mail);
if ($userEmailsList){
        $cm = new ClientManager($options = []);
            $client = $cm->make([
                'host'          => 'www.noxgamingqc.ca',
                'port'          => 993,
                'encryption'    => 'ssl',
                'validate_cert' => true,
                'username'      => $userEmailsList[0],
                'password'      => Session::get('email_client_password'),
                'protocol'      => 'imap'
            ]);
            $client->connect();

            /** @var \Webklex\PHPIMAP\Support\FolderCollection $folders */
            $folders = $client->getFolders();
            foreach($folders as $folder){
                /** @var \Webklex\PHPIMAP\Support\MessageCollection $messages */         
                /** @var \Webklex\PHPIMAP\Support\FlagCollection $flags */
                $messages = $folder->messages()->all()->get();
                foreach($messages as $key => $message){
                    $mails[$key] =  [
                        'uid' => $message->getUid(),
                        'subject' => $message->getSubject()->first(),
                        'html_message' => $message->getHTMLBody(),
                        'text_message' => $message->getTextBody(),
                        'from' => $message->getFrom()[0]->mail,
                        'flags' => $message->getFlags(),
                        'attachement_count' => $message->getAttachments()->count()
                    ];
                }
            }
        } else {
            $mails = [];
        }
            
            return view('view.profile.mails')->with([
                    'mails' => $mails,
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
                return view('view.profile.mail')->with([
                    'header' => 'false',
                    'mails' => $mail,
                    'mailsContent' => $mailsContent,
                    'emailList' => $emailList
                ]);
            }
        }
        abort(403);
    }

    public function showContent($uid) {
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

            $userEmailsList = explode(';', Auth::user()->local_mail);
            if ($userEmailsList){
                $cm = new ClientManager($options = []);
                    $client = $cm->make([
                        'host'          => 'www.noxgamingqc.ca',
                        'port'          => 993,
                        'encryption'    => 'ssl',
                        'validate_cert' => true,
                        'username'      => $userEmailsList[0],
                        'password'      => Session::get('email_client_password'),
                        'protocol'      => 'imap'
                    ]);
                    $client->connect();

                    /** @var \Webklex\PHPIMAP\Query\WhereQuery $query */
                    /** @var \Webklex\PHPIMAP\Message $message */       
                    /** @var \Webklex\PHPIMAP\Support\FlagCollection $flags */
                    $message = $query->getMessageByUid($uid);
                    $messageContent =  [
                        'uid' => $message->getUid(),
                        'subject' => $message->getSubject()->first(),
                        'html_message' => $message->getHTMLBody(),
                        'text_message' => $message->getTextBody(),
                        'from' => $message->getFrom()[0]->mail,
                        'flags' => $message->getFlags(),
                        'attachement_count' => $message->getAttachments()->count()
                    ];
            } else {
                $messageContent = [];
            }
            
            return view('view.profile.mail')->with([
                    'messageContent' => $messageContent,
            ]);
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
                    $message->getHeaders()->addTextHeader('List-Unsubscribe', 'https://www.noxgamingqc.ca/' . Auth::user()->id . '/unsubscribe');
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
        $isEmailExists = User::isMailExist($request['recipient']);
        if(!$isEmailExists) {
            abort(550);
        }
        $index = MailIndex::where('owner','=', $request['recipient'])->where('object', 'LIKE', '%'. $request['subject'] .'%')->where('participants', '=', $request['sender'])->get();
        $mail = new Mails();
        $senderEmail = $request['sender'];
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

    public function testMail() {
        $data = [
            'sender' => 'noreply@noxgamingqc.ca',
            'recipient' => '',
            'object' => 'website test',
            'messageContent' => 'test successful'
        ];

        Mail::send('emails.standard', $data, function($message) use ($data) {
            $message->from($data['sender'], 'noxgamingqc');
            $message->to($data['recipient']);
            $message->subject($data['object']);
            $message->getHeaders()->addTextHeader('List-Unsubscribe', 'https://www.noxgamingqc.ca/' . Auth::user()->id . '/unsubscribe');
        });
        dd('email sent successfuly');
        return view('view.welcome');
    }
}