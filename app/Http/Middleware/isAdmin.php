<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
        $admin = session()->get('admin');
        if ($admin == null) {
            return redirect(url('/login-admin'))->with('status', 'anda harus login!');
        }
        return $next($request);
    }
}
