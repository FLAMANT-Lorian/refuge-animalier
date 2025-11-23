<?php

use App\Http\Controllers\AnimalController;

Route::get('/', function () {
    return view('public.homepage');
})->name('public.homepage');

Route::get('/a-propos', function () {
    return view('public.pages.about');
})->name('public.about');

Route::get('/contact', function () {
    return view('public.pages.contact');
})->name('public.contact');

Route::get('/nos-animaux', [AnimalController::class, 'index'])->name('public.animals.index');
Route::get('/nos-animaux/{animal}', [AnimalController::class, 'show'])->name('public.animals.show');
