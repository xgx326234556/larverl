<?php

namespace App\Common;

use Closure;

class EnableCrossRequestMiddleware
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
        header('Access-Control-Allow-Origin:*');
        $response = $next($request);
        //$response->headers->add(['Access-Control-Allow-Headers' => 'Origin, Content-Type, Cookie,X-CSRF-TOKEN, Accept,Authorization,token,cache-control']);
        return $response;
    }
}
