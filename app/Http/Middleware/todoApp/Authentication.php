<?php

namespace App\Http\Middleware\todoApp;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authentication
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
//        return Auth::onceBasic() ?: $next($request);
        $auth = $request->header('X-API-TOKEN');
        if ('Logging' != $auth)
        {
            abort(401, 'Auth Token Not Found!');
        }
        return $next($request);
    }
}
