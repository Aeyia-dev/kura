<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Landing', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/email-signatures-iframe', function () {
        return Inertia::render('EmailSignaturesIframe');
    })->name('email-signatures-iframe');

    Route::get('/email-signatures-popup', function () {
        return view('email-signatures');
    })->name('email-signatures-popup');
});
