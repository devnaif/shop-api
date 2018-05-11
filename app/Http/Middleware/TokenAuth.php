<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Middleware\BaseMiddleware;

class TokenAuth extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( ! $token = $this->auth->setRequest($request)->getToken() )
        {
            return $this->respond('tymon.jwt.absent', 'Token Not Provided', 400);
        }
        try
        {
            $user = $this->auth->authenticate($token);
        }
        catch(TokenExpiredException $e)
        {
            return $this->respond('tymon.jwt.expired', 'Token Expired',
                $e->getStatusCode(), [$e]);
        }
        catch(JWTException $e)
        {
            return $this->respond('tymon.jwt.invalid', 'Token Invalid',
                $e->getStatusCode(), [$e]);
        }

        return $next($request);
    }
}
