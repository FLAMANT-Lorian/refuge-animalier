<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\SetLocale;

// Pour être automatiquement redirigé vers "/fr"
Route::get('/', function () {
    return redirect('/' . config('app.locale'));
});

Route::prefix('{locale}')->middleware([SetLocale::class])->group(function () {
    Route::get('/', function () {
        return view('public.homepage');
    })->name('public.homepage');

    Route::get('/a-propos', function () {
        return view('public.pages.about');
    })->name('public.about');

    Route::get('/contact', [ContactController::class, 'index'])->name('public.contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('public.contact.store');

    Route::get('/nos-animaux', [AnimalController::class, 'index'])->name('public.animals.index');
    Route::get('/nos-animaux/{animal}', [AnimalController::class, 'show'])->name('public.animals.show');
});
