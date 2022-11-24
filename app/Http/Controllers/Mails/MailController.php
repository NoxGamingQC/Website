<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ZBateson\MailMimeParser\MailMimeParser;
use ZBateson\MailMimeParser\Message;
use ZBateson\MailMimeParser\Header\HeaderConsts;
use App\Mails;

class MailController extends Controller
{
    public function receive(Request $request) {

        $mailParser = new MailMimeParser();

        $mail = new Mails();

        $message = $mailParser->parse($request, false);
        
        $mail->sender = $message->getHeaderValue(HeaderConsts::FROM);
        //$mail->sender_name = $message->getHeader(HeaderConsts::FROM)->getPersonName();
        $mail->object = $message->getHeaderValue(HeaderConsts::SUBJECT);
        $mail->recipient = $message->getHeaderValue(HeaderConsts::TO);
        //echo $message->getHeader(HeaderConsts::CC)->getAddresses()[0]->getEmail();
        $mail->message = $message->getTextContent();
        $mail->content_type = $message->getHeaderValue(HeaderConsts::CONTENT_TYPE);
        $mail->save();
    }
}