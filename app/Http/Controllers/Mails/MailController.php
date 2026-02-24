<?php

namespace App\Http\Controllers\Mails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Support\Facades\Log;

class MailController extends Controller
{
    public function storeIncoming(Request $request)
    {
        $recipient = strtolower(trim($request->recipient));
        if (!$recipient) {
            Log::warning('Recipient missing', $request->all());
            return response('Invalid payload', 400);
        }

        $user = User::where('local_mail', $recipient)->first();
        if (!$user && User::whereNotNull('aliases')->exists()) {
            $usersWithAliases = User::whereNotNull('aliases')->get();
            foreach ($usersWithAliases as $u) {
                $aliasList = array_map('trim', explode(';', strtolower($u->aliases)));
                if (in_array($recipient, $aliasList)) {
                    $user = $u;
                    break;
                }
            }
        }

        if (!$user) {
            Log::warning("Mailbox not found: {$recipient}");
            return response('550 5.1.1 User unknown', 406);
        }

        $localPart   = explode('@', $user->local_mail)[0];
        $maildirRoot = rtrim(env('MAILDIR_ROOT'), '/');
        $userPath    = $maildirRoot . '/' . $localPart;

        $tmpPath = $userPath . '/tmp';
        $newPath = $userPath . '/new';

        foreach ([$userPath, $tmpPath, $newPath] as $path) {
            if (!is_dir($path)) mkdir($path, 0770, true);
        }

        $filename = time() . '.' . bin2hex(random_bytes(8)) . '.eml';
        $tmpFile  = $tmpPath . '/' . $filename;
        $newFile  = $newPath . '/' . $filename;

        try {
            $from    = $request->input('from', 'unknown@localhost');
            $to      = $recipient;
            $subject = $request->input('subject', '(No subject)');
            $date    = $request->input('Date') ?? date(DATE_RFC2822);
            $body    = $request->input('body-plain') ?? $request->input('body-html') ?? json_encode($request->all(), JSON_UNESCAPED_UNICODE);

            $eml = "From: {$from}\r\n";
            $eml .= "To: {$to}\r\n";
            $eml .= "Subject: {$subject}\r\n";
            $eml .= "Date: {$date}\r\n";
            $eml .= "MIME-Version: 1.0\r\n";
            $eml .= "Content-Type: text/plain; charset=UTF-8\r\n\r\n";
            $eml .= $body;

            file_put_contents($tmpFile, $eml);
            chmod($tmpFile, 0660);
            rename($tmpFile, $newFile);

        } catch (\Exception $e) {
            Log::error('Mail write failed: ' . $e->getMessage());
            return response('451 Temporary failure', 500);
        }

        return response('OK', 200);
    }
}