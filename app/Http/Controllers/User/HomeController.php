<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\IpHelper;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        //getting country name for choosing language
        if($this->getUserCountry($request)=='Iran') {

        }else {

        }

        return view('user.index');
    }

    public function getUserCountry(Request $request): \Illuminate\Http\JsonResponse
    {
        $country = IpHelper::getUserCountry();

        return response()->json(['country' => $country]);
    }

}
