<?php

use App\Http\Middleware\SetLocale;

Route::prefix('{locale}')->middleware([SetLocale::class, 'auth'])->group(function () {

    Route::livewire('/admin/dashboard', 'pages::dashboard')->name('admin.dashboard');

    Route::livewire('/admin/settings', 'pages::settings')->name('admin.settings');

    Route::livewire('/admin/animals', 'pages::animals.index')->name('admin.animals.index');
    Route::livewire('/admin/animals/create', 'pages::animals.create')->name('admin.animals.create');
    Route::livewire('/admin/animals/{animal}/edit', 'pages::animals.edit')->name('admin.animals.edit');
    Route::livewire('/admin/animals/{animal}', 'pages::animals.show')->name('admin.animals.show');

    Route::livewire('/admin/messages', 'pages::messages.index')->name('admin.messages.index');

    Route::livewire('/admin/volunteers', 'pages::volunteers.index')->name('admin.volunteers.index');
    Route::livewire('/admin/volunteers/create', 'pages::volunteers.create')->name('admin.volunteers.create');
    Route::livewire('/admin/volunteers/{volunteer}', 'pages::volunteers.show')->name('admin.volunteers.show');

    Route::livewire('/admin/adoption-requests', 'pages::adoption-requests.index')->name('admin.adoption-requests.index');

    Route::livewire('/admin/animal-sheets', 'pages::animal-sheets.index')->name('admin.animal-sheets.index');

});
