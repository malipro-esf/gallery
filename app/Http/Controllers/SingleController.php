<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;

class SingleController extends Controller
{
    /**
     * @param Artwork $artwork
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Artwork $artwork)
    {
        $comments = $artwork->comments()->latest()->paginate(15);

        return view('user_test.single', compact('artwork','comments'));

    }

    public function comment(Request $request, Artwork $artwork)
    {
        $request->validate([
            'message' => 'required'
        ]);

        $artwork->comments()->create([
            'user_fullname' => auth()->user()->name,
            'user_id' => auth()->user()->id,
            'message' => $request->input('message'),
            'email' => auth()->user()->email,
        ]);

        return ['created' => true];

        return redirect()->route('single', $artwork->id);
    }
}
