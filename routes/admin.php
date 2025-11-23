<?php

Route::livewire('/login', 'pages::login')->name('admin.login');

Route::livewire('/dashboard', 'pages::dashboard')->name('admin.dashboard');

Route::livewire('/settings', 'pages::settings')->name('admin.settings');

Route::livewire('/animals', 'pages::animals.index')->name('admin.animals.index');
Route::livewire('/animals/create', 'pages::animals.create')->name('admin.animals.create');
Route::livewire('/animals/{animal}/edit', 'pages::animals.edit')->name('admin.animals.edit');
Route::livewire('/animals/{animal}', 'pages::animals.show')->name('admin.animals.show');

Route::livewire('/messages', 'pages::messages.index')->name('admin.messages.index');

Route::livewire('/volunteers', 'pages::volunteers.index')->name('admin.volunteers.index');
Route::livewire('/volunteers/create', 'pages::volunteers.create')->name('admin.volunteers.create');
// Route::livewire('/volunteers/{volunteer}', 'pages::volunteers.show')->name('admin.volunteers.show');
Route::livewire('/volunteers/1', 'pages::volunteers.show')->name('admin.volunteers.show');

Route::livewire('/adoption-requests', 'pages::adoption-requests.index')->name('admin.adoption-requests.index');

Route::livewire('/animal-sheets', 'pages::animal-sheets.index')->name('admin.animal-sheets.index');
