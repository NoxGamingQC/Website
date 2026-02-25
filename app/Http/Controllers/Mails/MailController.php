<?php

namespace App\Http\Controllers\Mails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MailController extends Controller
{
    public function receiveMail(Request $request)
    {
        $recipient = $request->recipient;
        if (!$recipient) return response('No recipient', 400);

        $userDir = explode('@', $recipient)[0];
        $mailDir = "/var/mailapp/noxgamingqc.ca/{$userDir}/tmp";
        if (!is_dir($mailDir)) {
            if (!mkdir($mailDir, 0770, true)) {
                Log::error("Cannot create maildir: {$mailDir}");
                return response('Cannot create mailbox folder', 500);
            }
        }

        $boundary = "=_".md5(uniqid(time(), true));

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

        $emlFile = $mailDir."/".time()."_".Str::random(6).".eml";

        if (file_put_contents($emlFile, implode("\r\n", $headers)."\r\n\r\n".$body) === false) {
            Log::error("Failed to write EML: {$emlFile}");
            return response('Failed to save mail', 500);
        }

        @chown($emlFile, 5000);
        @chgrp($emlFile, 'mail');
        @chmod($emlFile, 0660);

        return response('Mail saved', 200);
    }
}