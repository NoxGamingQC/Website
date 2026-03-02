<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    /**
     * Set the application locale.
     *
     * @param string $language
     * @return RedirectResponse
     */
    public function index(string $language): RedirectResponse
    {
        $allowedLocales = ['fr-ca', 'en-ca'];

        if (!in_array($language, $allowedLocales)) {
            abort(403, 'Unsupported language.');
        }

        app()->setLocale($language);

        return redirect($language . '/');
    }
}