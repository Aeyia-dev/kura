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

// Email signatures route - publicly accessible
Route::get('/email-signatures-popup', function () {
    return view('email-signatures');
})->name('email-signatures-popup');


Route::get('/email-signatures', function () {
    return Inertia::render('EmailSignatures');
})->name('email-signatures');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
