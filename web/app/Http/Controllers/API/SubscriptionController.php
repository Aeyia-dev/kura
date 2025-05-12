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
}