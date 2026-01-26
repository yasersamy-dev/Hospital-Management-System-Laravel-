<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DoctorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
          
         if (!auth()->check() || auth()->user()->role !== 'doctor') {
        // abort(403);
        return redirect()
        ->route('home.index')
        ->with('error','Access denied. you are not authorized to access this page ');
    }

        return $next($request);
    }
}
