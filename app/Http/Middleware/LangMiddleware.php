<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class LangMiddleware
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
        if (session('lang')){
            $locale = session()->get('lang');
            App::setLocale($locale);
        }else{
            $locale = session()->put('lang', Config::get('app.locale'));
            App::setLocale($locale);
        }
        return $next($request);
    }
}
