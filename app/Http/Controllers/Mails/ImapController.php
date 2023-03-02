<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImapController extends Controller
{
    
    public function index() {
    }

    public function post(Request $request) {
        $imapRequest = new Imap;
        $imapRequest->request = $request;
        $imapRequest->save();
    }
}