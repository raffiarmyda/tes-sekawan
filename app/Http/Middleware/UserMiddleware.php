<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() != 1) {
            return redirect('/login');
        }
        $user = Auth::User()->role;

        if ($user == 'Master Admin') {

        }
        elseif ($user =='Admin')
        {
            if ($request->is('*user*') || $request->is('*order*')) {
                return redirect('/home')->with('danger', 'Anda Tidak Memiliki akses');

            }
        }
        return $next($request);
    }
    }
