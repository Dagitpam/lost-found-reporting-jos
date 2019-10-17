<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ReportMisingItems;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->email=='admin@gmail.com') {

            $user_list = User::orderBy('created_at','desc')->paginate(3);
            return view('admin_home')->with('user_list',$user_list);

        } else {
            $posts = ReportMisingItems::orderBy('created_at','desc')->paginate(5);
            //To select a particular field with where
            //$posts = Post::where('title','Title two')->get();
            
            return view('home')->with('posts',$posts);
            
        }
        
        
    }
}
