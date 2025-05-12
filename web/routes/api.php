<?php

use App\Http\Controllers\API\SubscriptionController;
use App\Http\Controllers\API\HubspotWebhookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Public API Routes
Route::post('/subscribe', [SubscriptionController::class, 'subscribe']);
Route::post('/contact', [SubscriptionController::class, 'contactSubmission']);

// Hubspot Webhook Routes
Route::any('/webhooks/hubspot', [HubspotWebhookController::class, 'handle']);
