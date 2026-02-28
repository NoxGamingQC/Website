<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use eXorus\PhpMimeMailParser\Parser;
use Illuminate\Support\Facades\Log;

class MailController extends Controller
{
    public function receiveMail(Request $request)
    {
        try {
            $mailFile = $request->file('attachment-1');
            if (!$mailFile) {
                Log::error('No mail attachment found');
                return response()->json(['error' => 'No attachment'], 400);
            }

            $rawContent = file_get_contents($mailFile->getRealPath());
            $decodedContent = @gzdecode($rawContent) ?: $rawContent;

            $parser = new Parser();
            $parser->setText($decodedContent);

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
                ->orWhereRaw('? = ANY(string_to_array(aliases, \';\'))', [$recipient])
                ->first();

                if (!$user) {
                    Log::warning("No user found for recipient: $recipient");
                    continue;
                }

                $userFolder = "/var/mailapp/{$domainPart}/{$localPart}";
                if (!is_dir($userFolder)) mkdir($userFolder, 0775, true);

                $timestamp = time();
                $filename = $userFolder . "/{$timestamp}.eml";

                file_put_contents($filename, $decodedContent);

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