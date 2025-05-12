<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

/**
 * Controller for handling Hubspot webhooks.
 */
class HubspotWebhookController extends Controller
{
    /**
     * Handle the incoming Hubspot webhook request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request): Response
    {
        // Log the entire request payload
        Log::info('Hubspot webhook received', [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'payload' => $request->all(),
            'headers' => $request->headers->all(),
        ]);

        // Return a successful response
        return response()->noContent(Response::HTTP_OK);
    }
}