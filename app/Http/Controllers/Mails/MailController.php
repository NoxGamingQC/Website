<?php

namespace App\Http\Controllers\Mails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Model\User;

class MailController extends Controller
{
    public function receive(Request $request) {
        $recipient = $request->input('recipient');

        if (!$recipient) {
            return response()->json(['error' => 'No recipient'], 400);
        }

        $user = User::where('email', $recipient)
            ->orWhereRaw("? = ANY(string_to_array(aliases, ';'))", [$recipient])
            ->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $storageUrl = $request->input('storage.url.0');

        if (!$storageUrl) {
            return response()->json(['error' => 'No storage URL'], 400);
        }

        $response = Http::withBasicAuth('api', env('MAILGUN_SECRET'))
            ->get($storageUrl);

        if (!$response->successful()) {
            return response()->json(['error' => 'Unable to fetch message'], 400);
        }

        $mime = $response->body();

        $basePath = "/var/mailapp/noxgamingqc.ca/" . $user->username;
        $newPath = $basePath . "/new";

        if (!is_dir($newPath)) {
            return response()->json(['error' => 'Maildir not found'], 500);
        }

        $filename = time() . '.' . uniqid() . '.mail';

        file_put_contents($newPath . '/' . $filename, $mime);

        return response()->json(['status' => 'stored'], 200);
    }
}