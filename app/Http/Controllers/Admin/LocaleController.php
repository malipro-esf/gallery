<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function setLocale($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        session()->save();

        return back();
    }
}
