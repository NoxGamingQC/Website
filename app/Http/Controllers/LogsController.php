<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LogsController extends Controller
{
    protected $logPath;

    public function __construct()
    {
        $this->logPath = storage_path('logs');
    }

    public function index(Request $request)
    {
        if(!auth()->check()) {
            abort(403);
        }
        if(!auth()->user()->is_management) {
            abort(403);
        }
        $logPath = storage_path('logs');
        $files = File::files($logPath);
        $files = array_map(fn($f) => $f->getFilename(), $files);
        rsort($files);

        $selectedFile = $request->get('file', $files[0] ?? null);
        $logs = [];

        if ($selectedFile && File::exists($logPath . '/' . $selectedFile)) {
            $content = File::get($logPath . '/' . $selectedFile);
            $lines = explode("\n", $content);

            $currentEntry = null;

            foreach ($lines as $line) {
                if (preg_match('/^\[\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\] (\w+)\.(\w+): (.+)$/', $line, $matches)) {
                    if ($currentEntry) {
                        $logs[] = $currentEntry;
                    }

                    $type = strtoupper($matches[2]);
                    $title = $matches[3];
                    $currentEntry = [
                        'type' => $type,
                        'title' => $title,
                        'body' => [],
                        'raw' => $line
                    ];
                } elseif ($currentEntry) {
                    $currentEntry['body'][] = $line;
                }
            }

            if ($currentEntry) {
                $logs[] = $currentEntry;
            }
        }

        return view('pages.management.logs', compact('files', 'selectedFile', 'logs'));
    }

    public function download($filename)
    {
        $filePath = $this->logPath . '/' . $filename;
        if (!File::exists($filePath)) {
            abort(404);
        }

        return new StreamedResponse(function () use ($filePath) {
            readfile($filePath);
        }, 200, [
            'Content-Type' => 'text/plain',
            'Content-Disposition' => "attachment; filename=\"$filename\""
        ]);
    }
}