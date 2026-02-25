<?php

namespace App\Http\Controllers\Mails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Model\User;
use Illuminate\Support\Facades\Log;


class MailController extends Controller
{
    public function receiveMail(Request $request) {
        try {

            Log::info('MAILGUN WEBHOOK RECEIVED', $request->all());

            $toHeader = $request->input('To')
                ?? $request->input('message.headers.to');

            if (!$toHeader) {
                Log::error('No recipient header found');
                return response()->json(['error' => 'No recipient header'], 200);
            }

            preg_match('/<(.+?)>/', $toHeader, $matches);
            $recipient = $matches[1] ?? trim($toHeader);

            $recipient = strtolower(trim($recipient));

            Log::info('Parsed recipient', ['recipient' => $recipient]);

            $user = User::whereRaw('LOWER(email) = ?', [$recipient])
                ->orWhereRaw('? = ANY(string_to_array(aliases, \';\'))', [$recipient])
                ->first();

            if (!$user) {
                Log::error('User not found', ['recipient' => $recipient]);
                return response()->json(['error' => 'User not found'], 200);
            }

            Log::info('User matched', ['username' => $user->username]);

            $storageUrl = $request->input('storage.url.0');

            if (!$storageUrl) {
                Log::error('No storage URL');
                return response()->json(['error' => 'No storage URL'], 200);
            }

            $response = Http::withBasicAuth('api', env('MAILGUN_SECRET'))
                ->get($storageUrl);

            if (!$response->successful()) {
                Log::error('Failed fetching MIME from Mailgun', [
                    'status' => $response->status()
                ]);
                return response()->json(['error' => 'Fetch failed'], 200);
            }

            $mime = $response->body();

            $basePath = "/var/mailapp/noxgamingqc.ca/" . $user->username;
            $maildirNew = $basePath . "/new";
            $maildirTmp = $basePath . "/tmp";

            if (!is_dir($maildirNew) || !is_dir($maildirTmp)) {
                Log::error('Maildir structure missing', ['path' => $basePath]);
                return response()->json(['error' => 'Maildir missing'], 200);
            }

            $hostname = gethostname();
            $filename = time() . '.' . bin2hex(random_bytes(8)) . '.' . $hostname;

            $tmpFile = $maildirTmp . '/' . $filename;
            $newFile = $maildirNew . '/' . $filename;

            file_put_contents($tmpFile, $mime);

            rename($tmpFile, $newFile);

            Log::info('Mail stored successfully', [
                'path' => $newFile
            ]);

            return response()->json(['status' => 'stored'], 200);

        } catch (\Throwable $e) {

            Log::critical('MAIL RECEIVE FATAL ERROR', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json(['error' => 'Server error'], 200);
        }
    }
}