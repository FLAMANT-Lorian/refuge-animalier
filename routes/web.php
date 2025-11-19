<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('public.homepage');
})->name('public.homepage');

Route::get('/a-propos', function (){
    return view('public.pages.about');
})->name('public.about');

Route::get('/contact', function (){
    return view('public.pages.contact');
})->name('public.contact');

Route::get('/nos-animaux', function (){
    return view('public.animals.index');
})->name('public.animals.index');
