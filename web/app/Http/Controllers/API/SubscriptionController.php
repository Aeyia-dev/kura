<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\KlaviyoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubscriptionController extends Controller
{
    /**
     * Handle email subscription request
     *
     * @param Request $request
     * @param KlaviyoService $klaviyoService
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribe(Request $request, KlaviyoService $klaviyoService)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'list' => ['sometimes', 'string'],
        ]);

        $email = $request->input('email');
        $listSource = $request->input('list', 'default');
        $result = $klaviyoService->subscribeToList($email, $listSource);
        return response()->json($result, $result['success'] ? 200 : 500);
    }

    /**
     * Handle contact form submission
     *
     * @param Request $request
     * @param \App\Services\HubspotService $hubspotService
     * @return \Illuminate\Http\JsonResponse
     */
    public function contactSubmission(Request $request, \App\Services\HubspotService $hubspotService)
    {
        $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'message' => ['required', 'string'],
        ]);

        // Log the request for debugging
        Log::info('Contact form submission received', $request->all());

        // Save contact to HubSpot
        $result = $hubspotService->createContact(
            $request->input('fullName'),
            $request->input('email'),
            $request->input('phone'),
            $request->input('message')
        );

        if (!$result['success']) {
            Log::error('Failed to save contact to HubSpot', $result);

            return response()->json([
                'success' => false,
                'message' => 'We received your message but had technical difficulties saving your contact information. We\'ll still get back to you soon.'
            ], 500);
        }

        // Return a success response
        return response()->json([
            'success' => true,
            'message' => 'Thank you for your message. We\'ll get back to you soon.'
        ]);
    }
}