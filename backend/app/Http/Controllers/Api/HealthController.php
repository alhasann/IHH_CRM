<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class HealthController extends Controller
{
    /**
     * Health check endpoint
     */
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'status' => 'OK',
            'message' => 'IHH CRM API is running',
            'version' => config('app.version', '1.0.0'),
            'timestamp' => now()->toIso8601String(),
        ]);
    }
}
