<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DebugProductRequest
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Chỉ log cho route product store
        if ($request->is('admin/product/store')) {
            Log::info('=== DEBUG PRODUCT STORE REQUEST ===');
            Log::info('Method: ' . $request->method());
            Log::info('URL: ' . $request->fullUrl());
            Log::info('All Input:', $request->all());
            Log::info('Files:', $request->allFiles());
            Log::info('User ID: ' . (auth()->check() ? auth()->id() : 'Not authenticated'));
            Log::info('CSRF Token: ' . $request->input('_token'));
            Log::info('==========================================');
        }

        return $next($request);
    }
}