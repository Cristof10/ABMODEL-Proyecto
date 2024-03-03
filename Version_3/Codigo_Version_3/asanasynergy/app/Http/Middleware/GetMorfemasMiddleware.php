<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Morfema; // Import the Morfema class from the appropriate namespace
use Illuminate\Routing\Controllers\Middleware;

class GetMorfemasMiddleware extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $morfemas = Morfema::all(); // Fetch all morfemas}

        $request->merge(['morfemas' => $morfemas]);

        return $next($request);
    }
}
