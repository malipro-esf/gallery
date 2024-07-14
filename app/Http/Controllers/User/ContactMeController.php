<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMeRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactMeController extends Controller
{
    public function index()
    {
        return view('user.pages.contact');
    }

    public function store(ContactMeRequest $request)
    {
        $validated = $request->validated();

        $result = Contact::create([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        if ($result)
            session()->flash('message', __('messages.Thanks for contacting us'));
        else
            session()->flash('alert-message', __('messages.Something went wrong'));

        return back();

    }

    public function refreshCaptcha(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
