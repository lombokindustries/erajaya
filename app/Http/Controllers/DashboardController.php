<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function index()
    {
        //Clear all users
        if(!empty(Auth::user()->email_verified_at) && Auth::user()->status == "uv")
        {
            User::where('id',Auth::user()->id)->update(['status'=>'vr']);
        }

        return view('admin.dashboard.index');
    }
}
