<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use Illuminate\Http\Request;
use App\Helpers\IpHelper;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $artworks = Artwork::with('images')->get();
        return view('user.index' , compact('artworks'));
    }

    public function about()
    {
        return view('user.pages.about');
    }



}
