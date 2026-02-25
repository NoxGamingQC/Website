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
                Log::error('No recipient header found');
                return response()->json(['error' => 'No recipient header'], 200);
            }

            preg_match('/<(.+?)>/', $toHeader, $matches);
            $recipient = strtolower(trim($matches[1] ?? $toHeader));
            $localPart = explode('@', $recipient)[0];

            $user = User::whereRaw('LOWER(SPLIT_PART(email, \'@\', 1)) = ?', [$localPart])
                ->orWhereRaw('? = ANY(string_to_array(aliases, \';\'))', [$localPart])
                ->first();

            if (!$user) {
                Log::error('User not found', ['recipient' => $localPart]);
                return response()->json(['error' => 'User not found'], 200);
            }

            $storeLocalPart = explode('@', $user->email)[0];
            $basePath = "/var/mailapp/noxgamingqc.ca/" . $storeLocalPart;
            $maildirNew = $basePath . "/new";
            $maildirTmp = $basePath . "/tmp";

            if (!is_dir($maildirNew) || !is_dir($maildirTmp)) {
                Log::error('Maildir structure missing', ['path' => $basePath]);
                return response()->json(['error' => 'Maildir missing'], 200);
            }

            $storageUrl = $request->input('storage.url.0');
            if (!$storageUrl) {
                Log::error('No storage URL provided');
                return response()->json(['error' => 'No storage URL'], 200);
            }

            $response = Http::withBasicAuth('api', env('MAILGUN_SECRET'))->get($storageUrl);
            if (!$response->successful()) {
                Log::error('Failed fetching MIME', ['status' => $response->status()]);
                return response()->json(['error' => 'Fetch failed'], 200);
            }

            $mime = $response->body();

            $hostname = gethostname();
            $filename = time() . '.' . bin2hex(random_bytes(8)) . '.' . $hostname;
            $tmpFile = $maildirTmp . '/' . $filename;
            $newFile = $maildirNew . '/' . $filename;

            file_put_contents($tmpFile, $mime);
            rename($tmpFile, $newFile);

            return response()->json(['status' => 'stored'], 200);

        } catch (\Throwable $e) {
            Log::error('MAIL RECEIVE ERROR', ['reason' => $e->getMessage()]);
            return response()->json(['error' => 'Server error'], 200);
        }
    }
}