<?php

use App\Livewire\Auth;
use App\Livewire\Contact;
use App\Livewire\RealtimeMessage;
use Illuminate\Support\Facades\Route;

Route::get('/', Auth::class)->name('login');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/contact', Contact::class)->name('contact');
    Route::get('/message/{roomId}', RealtimeMessage::class)->name('message');
});

