<?php

namespace App\Http\Middleware;

use App\Exceptions\Auth\UnauthenticatedException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     * @throws UnauthenticatedException
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (\Throwable $exception) {
            throw new UnauthenticatedException();
        }

        foreach ($guards as $guard) {
            if (!Auth::guard($guard)->check()) {
                Auth::logout();
                throw new UnauthenticatedException();
            }
        }

        return $next($request);
    }
}
