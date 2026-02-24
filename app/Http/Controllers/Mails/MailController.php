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
        $rawEmail  = $request->input('body-mime') ?? $request->getContent();

        if (!$recipient) {
            Log::warning('Recipient missing', $request->all());
            return response('Invalid payload', 400);
        }

        if (!$rawEmail) {
            Log::warning('Raw email missing', $request->all());
            return response('Invalid payload', 400);
        }

        $user = User::where('local_mail', $recipient)->first();

        if (!$user) {
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

        $localPart = explode('@', $user->local_mail)[0];
        $maildirRoot = rtrim(env('MAILDIR_ROOT'), '/');
        $userPath    = $maildirRoot . '/' . $localPart;

        $tmpPath = $userPath . '/tmp';
        $newPath = $userPath . '/new';
        $curPath = $userPath . '/cur';

        foreach ([$userPath, $tmpPath, $newPath, $curPath] as $path) {
            if (!is_dir($path)) mkdir($path, 0770, true);
        }

        $filename = time() . '.' . bin2hex(random_bytes(8)) . '.eml';
        $tmpFile  = $tmpPath . '/' . $filename;
        $newFile  = $newPath . '/' . $filename;

        try {
            $rawEmail = "X-Original-To: {$recipient}\r\n" . $rawEmail;
            file_put_contents($tmpFile, $rawEmail);
            chmod($tmpFile, 0660);
            rename($tmpFile, $newFile);
        } catch (\Exception $e) {
            Log::error('Mail write failed: ' . $e->getMessage());
            return response('451 Temporary failure', 500);
        }

        return response('OK', 200);
    }
}