<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use App\Models\Bill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    public function index()
    {
        $artsCount = Artwork::count();
        $usersCount = User::where('type','user')->count();
        $billsCount = Bill::all();

        return view('admin.dashboard.index',compact('usersCount','billsCount','artsCount'));
    }


}
