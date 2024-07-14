<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    public function __invode(Request $request)
    {
        $request->validate(['email'=>'required|email']);

        $result = NewsLetter::create(['email' => $request['email']]);

        if($result)
            session()->flash('message' , __('messages.your email submitted'));
        else
            session()->flash('alert-message' , __('messages.Something went wrong'));
    }
}
