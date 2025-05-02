<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DefaultController;


Route::get('/', function () {
    return Inertia::render('Landing', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('/holding', [DefaultController::class, 'holding'])->name('holding');
Route::get('/society', [DefaultController::class, 'society'])->name('society');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/email-signatures', function () {
        return Inertia::render('EmailSignaturesIframe');
    })->name('email-signatures');

    Route::get('/email-signatures-popup', function () {
        return view('email-signatures');
    })->name('email-signatures-popup');
});
