<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequestStatusIsPublic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->route('request')->status == 1) {
            return $next($request);
        }
        abort(403);
    }
}
