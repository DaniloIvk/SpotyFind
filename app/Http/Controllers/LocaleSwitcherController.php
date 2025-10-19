<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocaleSwitcherController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $locale = $request->route()->originalParameter('locale');

        if (in_array($locale, config('app.available_locales'))) {
            session()->put('locale', $locale);
            app()->setLocale($locale);
        }

        return back();
    }
}
