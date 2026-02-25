<?php

namespace App\Http\Controllers\Mails;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Model\User;

class MailController
{
    public function receiveMail(Request $request)
    {
        try {

            $recipient = strtolower(trim($request->input('recipient')));

            if (!$recipient) {
                Log::error('No recipient received');
                return response()->json(['error' => 'No recipient'], 200);
            }

            $user = User::whereRaw('LOWER(local_mail) = ?', [$recipient])
                ->orWhereRaw('? = ANY(string_to_array(LOWER(aliases), \';\'))', [$recipient])
                ->first();

            if (!$user) {
                Log::error('Mailbox not found');
                return response()->json(['error' => 'Mailbox not found'], 200);
            }

            $localPart = explode('@', strtolower($user->local_mail))[0];

            $basePath = "/var/mailapp/noxgamingqc.ca/" . $localPart;
            $maildirTmp = $basePath . "/tmp";
            $maildirNew = $basePath . "/new";

            if (!is_dir($maildirTmp) || !is_dir($maildirNew)) {
                Log::error('Maildir missing');
                return response()->json(['error' => 'Maildir missing'], 200);
            }

            $file = $request->file('attachment-1');

            if (!$file) {
                Log::error('No MIME attachment');
                return response()->json(['error' => 'No MIME attachment'], 200);
            }

            $raw = file_get_contents($file->getRealPath());

            if (!$raw) {
                Log::error('Read failed');
                return response()->json(['error' => 'Read failed'], 200);
            }

            $mime = @gzdecode($raw);
            if ($mime === false) {
                $mime = $raw;
            }

            $hostname = gethostname();
            $filename = time() . '.' . bin2hex(random_bytes(8)) . '.' . $hostname;

            $tmpFile = $maildirTmp . '/' . $filename;
            $newFile = $maildirNew . '/' . $filename;

            if (file_put_contents($tmpFile, $mime) === false) {
                Log::error('Write failed');
                return response()->json(['error' => 'Write failed'], 200);
            }

            if (!rename($tmpFile, $newFile)) {
                Log::error('Move failed');
                return response()->json(['error' => 'Move failed'], 200);
            }

            return response()->json(['status' => 'stored'], 200);

        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Server error'], 200);
        }
    }
}