<?php

namespace App\Http\Middleware;

use Closure;

class StudentLogin
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
        if (!session('id') || (session('id')>4 && session('id')<=10)) {
            return redirect('admin/login');
        }
        return $next($request);
    }
}
