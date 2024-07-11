<?php

namespace App\Http\Middleware;

use App\Helpers\IpHelper;
use Closure;
use Illuminate\Http\Request;

class SetLocale
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
        if (!session()->has('country_checked')) {
            $country = IpHelper::getUserCountry();

            //getting country name for choosing language
            if ($country == 'Iran') session()->put('locale', 'fa'); else session()->put('locale', 'en');

            session()->put('country_checked', true);

            session()->save();

        }
        return $next($request);
    }
}
