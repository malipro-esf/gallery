<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Helpers\IpHelper;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $artworks = Artwork::with('images')->orderBy('display_priority','desc')
            ->get();

        $blogs = Blog::with('images','tags')->latest()->get();
        return view('user.index' , compact('artworks','blogs'));
    }

    public function about()
    {
        return view('user.pages.about');
    }

}
