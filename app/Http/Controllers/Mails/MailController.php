<?php

namespace App\Http\Controllers\Mails;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Model\Mails;
use App\Model\MailIndex;
use App\Model\User;
use App\Model\MailAttachment;
use App\Model\MailRecord;
use Webklex\PHPIMAP\ClientManager;
use Webklex\PHPIMAP\Client;

class MailController extends Controller
{
    public function receive(Request $request)
{
    $mail = MailRecord::create([
        'mailbox_id' => 1,
        'sender' => $request->input('from'),
        'recipient' => $request->input('recipient'),
        'subject' => $request->input('subject'),
        'body_plain' => $request->input('body-plain'),
        'body_html' => $request->input('body-html'),
        'status' => 'received',
        'size' => strlen($request->input('body-plain'))
    ]);

    foreach ($request->allFiles() as $file) {
        $path = $file->store("attachments/{$mail->id}");
        MailAttachment::create([
            'mail_id' => $mail->id,
            'filename' => $file->getClientOriginalName(),
            'original_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType(),
            'file_size' => $file->getSize(),
            'disposition' => 'attachment',
            'storage_path' => $path
        ]);
    }

    return response('OK', 200);
}
}
