<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request)
    {
        if (!$request->expectsJson()) {

            if (Route::is("admin.*")) {
                // dd('testing admin');
                return route("adminlogin");
            } else {
                // dd('testing home');
                return route("login");
            }
        }
        return null;
    }
}
