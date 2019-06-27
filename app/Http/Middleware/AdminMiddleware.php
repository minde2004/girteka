<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
		if ($request->user() && $request->user()->level !== 1)
		{
			return redirect("/home");
		} elseif(!$request->user()){
			return redirect("/login");
		}
        return $next($request);
    }
}
