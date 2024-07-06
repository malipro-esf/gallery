<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function setLocale($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        session()->save();

        return back()->with('locale', $locale);
    }
}
