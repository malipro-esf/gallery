<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\IpHelper;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        return view('user.index');
    }

}
