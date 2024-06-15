<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;

class HomeController extends Controller
{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // for tdd
    public function index()
    {
        dd('home');
        $artworks = Artwork::latest()->paginate(15);

        return view('home',compact('artworks'));
    }

    public function home()
    {
        return view('user.home');
    }
}
