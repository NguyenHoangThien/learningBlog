<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Session;
use Request;
use Route;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $path      = Request::path();
        $flag      =  $path == "admin/login" || $path == "admin/login/auth";

        // if had login redirect to admin dashboard
        if(Session::get('userID') && $path == "admin/login") {
            return redirect('admin/category');
        }


        if(!Session::get('userID') && !$flag) {
            Session::put('rememberPath', $path);
            return redirect('/admin/login');
        }

        return $next($request);
    }
}
