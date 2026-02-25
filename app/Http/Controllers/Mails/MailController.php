<?php

namespace App\Http\Controllers\Mails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
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

        $rawMime = $request->input('body-mime');
        if (!$rawMime) return response('No MIME body', 400);

        $filename = time() . "." . getmypid() . "." . gethostname();
        $tmpFile  = "{$tmpPath}/{$filename}";
        $newFile  = "{$newPath}/{$filename}";

        if (file_put_contents($tmpFile, $rawMime) === false) {
            Log::error("Failed to write mail: {$tmpFile}");
            return response('Write failed', 500);
        }

        rename($tmpFile, $newFile);

        @chown($newFile, 5000);
        @chgrp($newFile, 'mail');
        @chmod($newFile, 0660);

        return response('Mail saved', 200);
    }
}