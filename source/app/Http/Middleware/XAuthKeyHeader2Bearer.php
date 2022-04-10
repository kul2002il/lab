<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class XAuthKeyHeader2Bearer
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
        if($request->hasHeader('X-Auth-Key'))
        {
            $request->headers->add([
                'Authorization' => 'Bearer ' . $request->header('X-Auth-Key')
            ]);
        }
        return $next($request);
    }
}
