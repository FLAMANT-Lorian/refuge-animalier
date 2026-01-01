<?php

namespace App\Http\Controllers;

class LocaleController extends Controller
{
    public function switchLocale($locale)
    {
        app()->setLocale($locale);

        $previous_url = url()->previous();

        $path = substr(parse_url($previous_url, PHP_URL_PATH), 1);

        $segments = explode('/', $path);

        $segments[0] = app()->getLocale();

        $redirectUrl = '/' . implode('/', $segments);

        return redirect($redirectUrl);
    }
}
