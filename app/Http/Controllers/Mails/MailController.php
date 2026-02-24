<?php

namespace App\Http\Controllers\Mails;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Model\MailRecord;
use App\Model\MailAttachment;
use App\Model\User;
use App\Model\Mailboxes;
use Webklex\PHPIMAP\ClientManager;
use Webklex\PHPIMAP\Client;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{
    public function receive(Request $request)
    {
        Log::info('MAILGUN PAYLOAD:', $request->all());
        $recipient = $request->input('recipient');
        $user = User::where('local_mail', $recipient)
                    ->orWhereRaw("aliases LIKE ?", ["%$recipient%"])
                    ->first();

        if ($user) {
            $mailbox = Mailboxes::where('user_id', $user->id)->where('name', 'inbox')->first();

            if (!$mailbox) {
                $mailbox = Mailboxes::create([
                    'user_id' => $user->id,
                    'name' => 'inbox'
                ]);
            }
            $mail = MailRecord::create([
                'mailbox_id' => $mailbox->id,
                'sender' => $request->input('sender'),
                'sender_name' => $request->input('from'),
                'recipient' => $request->input('recipient'),
                'subject' => $request->input('subject'),
                'body_plain' => $request->input('stripped-text'),
                'body_html' => $request->input('stripped-html'),
                'message_id' => $request->input('Message-Id'),
                'in_reply_to' => $request->input('In-Reply-To'),
                'status' => 'received',
                'size' => strlen($request->input('body-plain') ?? ''),
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
        }

        return response('OK', 200);
    }
}
