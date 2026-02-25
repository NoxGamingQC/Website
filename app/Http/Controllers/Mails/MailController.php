<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use PhpMimeMailParser\Parser;
use Illuminate\Support\Facades\Log;

class MailController extends Controller
{
    public function receiveMail(Request $request)
    {
        try {
            if (!$request->storage || !isset($request->storage['url'][0])) {
                Log::error('Mail storage URL missing');
                return response()->json(['error' => 'Storage URL missing'], 400);
            }

            $storageUrl = $request->storage['url'][0];
            Log::info('Mail storage URL: ' . $storageUrl);

            $rawMail = file_get_contents($storageUrl);
            if (!$rawMail) {
                Log::error('Unable to fetch raw mail from storage URL');
                return response()->json(['error' => 'Cannot fetch mail'], 400);
            }

            $parser = new Parser();
            $parser->setText($rawMail);

            $from = $parser->getHeader('from');
            $toHeader = $parser->getHeader('to');
            $subject = $parser->getHeader('subject') ?? 'No Subject';
            $html = $parser->getMessageBody('html') ?? '';
            $text = $parser->getMessageBody('text') ?? '';
            $attachments = $parser->getAttachments();

            $recipients = array_map('trim', explode(',', $toHeader));
            foreach ($recipients as $recipient) {
                $emailParts = explode('@', $recipient);
                $localPart = strtolower($emailParts[0]);
                $domainPart = strtolower($emailParts[1] ?? '');

                $user = User::where('local_mail', $recipient)
                            ->orWhereRaw("FIND_IN_SET(?, aliases)", [$recipient])
                            ->first();

                if (!$user) {
                    Log::warning("No user found for recipient: $recipient");
                    continue;
                }

                $userFolder = "/var/mailapp/{$domainPart}/{$localPart}";
                if (!is_dir($userFolder)) mkdir($userFolder, 0775, true);

                $timestamp = time();
                $filename = $userFolder . "/{$timestamp}.eml";

                file_put_contents($filename, $rawMail);

                foreach ($attachments as $attachment) {
                    $attPath = $userFolder . '/' . $attachment->getFilename();
                    file_put_contents($attPath, $attachment->getContent());
                }
            }

            return response()->json(['status' => 'ok']);
        } catch (\Exception $e) {
            Log::error('Mail receive error: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
}