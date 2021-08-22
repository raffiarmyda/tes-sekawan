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
        if(Auth::check() != 1){
            return redirect('/login');
        }
        $role = Auth::user()->role;
        if($role == 'Admin'){
            if($request->is('*user*') || $request->is('*driver*') || $request->is('*vehicle*')){
                return redirect('/home')->with('danger', 'Anda Tidak Memiliki akses');
            }
        }else if($role == 'Manager'){
            if($request->is('*user*') || $request->is('*driver*') || $request->is('*vehicle*')){
                return redirect('/home')->with('danger', 'Anda Tidak Memiliki akses');
            }

        }
        else if($role == 'Master Admin') {

        }

        return $next($request);
    }
    }
