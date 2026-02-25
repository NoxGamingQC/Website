<?php

namespace App\Http\Controllers\Mails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Model\User;

class MailController extends Controller
{
    public function receiveMail(Request $request)
    {
        $recipient = $request->recipient;
        if (!$recipient) return response('No recipient', 400);

        $user = User::where('local_mail', $recipient)
            ->orWhereRaw("EXISTS (
                SELECT 1 FROM unnest(string_to_array(aliases, ';')) AS alias
                WHERE alias = ?
            )", [$recipient])
            ->first();

        if (!$user) return response('Recipient not found', 404);

        $userDir = explode('@', $user->local_mail)[0];

        $basePath = "/var/mailapp/noxgamingqc.ca/{$userDir}";
        $tmpPath  = "{$basePath}/tmp";
        $newPath  = "{$basePath}/new";

        if (!is_dir($tmpPath)) mkdir($tmpPath, 0770, true);
        if (!is_dir($newPath)) mkdir($newPath, 0770, true);

        $boundary = "=_".md5(uniqid('', true));

        $headers = [];
        $headers[] = "From: ".$request->input('from');
        $headers[] = "To: {$recipient}";
        $headers[] = "Subject: ".$request->input('subject');
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-Type: multipart/mixed; charset=UTF-8; boundary=\"{$boundary}\"";

        $body = "--{$boundary}\r\n";
        $body .= "Content-Type: text/plain; charset=UTF-8\r\n\r\n";
        $body .= $request->input('body-plain') ?? '';
        $body .= "\r\n";

        foreach ($request->allFiles() as $file) {
            $content = chunk_split(base64_encode(file_get_contents($file->getRealPath())));
            $filename = $file->getClientOriginalName();
            $mime = $file->getMimeType();

            $body .= "--{$boundary}\r\n";
            $body .= "Content-Type: {$mime}; name=\"{$filename}\"\r\n";
            $body .= "Content-Transfer-Encoding: base64\r\n";
            $body .= "Content-Disposition: attachment; filename=\"{$filename}\"\r\n\r\n";
            $body .= $content . "\r\n";
        }

        $body .= "--{$boundary}--\r\n";

        $mailContent = implode("\r\n", $headers) . "\r\n\r\n" . $body;

        $mailFilename = time() . "." . getmypid() . "." . gethostname();
        $tmpFile = "{$tmpPath}/{$mailFilename}";
        $newFile = "{$newPath}/{$mailFilename}";

        if (file_put_contents($tmpFile, $mailContent) === false) {
            Log::error("Failed to write EML: {$tmpFile}");
            return response('Failed to save mail', 500);
        }

        rename($tmpFile, $newFile);

        @chown($newFile, 5000);
        @chgrp($newFile, 'mail');
        @chmod($newFile, 0660);

        return response('Mail saved', 200);
    }
}