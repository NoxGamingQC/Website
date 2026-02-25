<?php

namespace App\Http\Controllers\Mails;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Model\User;

class MailController
{
    public function receiveMail(Request $request)
    {
        try {
            $toHeader = $request->input('To') ?? $request->input('message.headers.to');

            if (!$toHeader) {
                Log::error('No recipient header');
                return response()->json(['error' => 'No recipient'], 200);
            }

            preg_match('/<(.+?)>/', $toHeader, $matches);
            $recipient = strtolower(trim($matches[1] ?? $toHeader));

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

            $storageUrl = $request->input('storage.url.0');

            if (!$storageUrl) {
                Log::error('Missing storage URL');
                return response()->json(['error' => 'Missing storage URL'], 200);
            }

            $response = Http::withBasicAuth('api', env('MAILGUN_SECRET'))
                ->get($storageUrl);

            if (!$response->successful()) {
                Log::error('MIME fetch failed');
                return response()->json(['error' => 'Fetch failed'], 200);
            }

            $mime = $response->body();

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