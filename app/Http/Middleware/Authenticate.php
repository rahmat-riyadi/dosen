<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {

        if(!$request->expectsJson()){

            if(Route::is('dosen.*')){
                return route('dosen');
            }

            if(Route::is('mahasiswa.*')){
                return route('mahasiswa');
            }

            if(Route::is('admin.*')){
                return route('admin');
            }

            return route('login');

        }

        // return $request->expectsJson() ? null : route('login');
    }
}
