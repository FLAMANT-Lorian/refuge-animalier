<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->segment(1);

        if (in_array($locale, config('app.supported_locales'))) {
            app()->setLocale($locale);
        } else {
            app()->setLocale(config('app.locale'));
        }

        URL::defaults(['locale' => app()->getLocale()]);

        return $next($request);
    }
}
