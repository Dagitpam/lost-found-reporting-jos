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

            $user_list = User::orderBy('created_at','desc')->paginate(5);
            return view('admin_home')->with('user_list',$user_list);

        } else {
            $posts = ReportMisingItems::orderBy('created_at','desc')->paginate(5);
            //To select a particular field with where
            //$posts = Post::where('title','Title two')->get();
            
            return view('home')->with('posts',$posts);
            
        }
        
        
    }
    public function destroy($id)
    {
        $post = User::find($id);
        $post->delete();
        return redirect('/destroy')->with('success','User deleted successfully'); 
    }
    public function selectUser(Request $request){

        $id = $request->input('id');
        $user = User::find($id);

        $name =$user->name;
        $email=$user->email;

        $results = array(
            'name' => $name,
            'email' =>$email,
            'error'=>'error'
        );
        $msg = $name;

        return response()->json($results, 200);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'name' => 'required',
            'email'=>'required'
        ],['name.required'=>'Name field is required','email.required'=>'Email field is required']);
        $update = User::find($id);
        $update-> name = $request->input('name');
        $update-> email = $request->input('email');
        $update-> save();
        return redirect('/destroy')->with('success','User Updated successfully!');
    }
}
