<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Here we are bringing the model
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\ReportMisingItems;
//Not using Eloquent(mysql)
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Not usin eloquent(SQL)
        //$posts = DB::select('SELECT * FROM posts');

        //Here we selected all the rows without order
        //$posts = Post::all();
        //We can also limit our code
        //$posts = Post::orderBy('title','desc')->take(1)->get();

        //we selected the rows with order
       // $posts = Post::orderBy('title','desc')->get();
        //pagination
        if (Auth::user()->email=='admin@gmail.com') {

            $missing_items = ReportMisingItems::orderBy('name','desc')->paginate(5);

            return view('posts.admin_missing_items')->with('missing_items',$missing_items);

        } else {

            $posts = ReportMisingItems::where('status','1')->orderBy('name','desc')->paginate(5);
            //To select a particular field with where
            //$posts = Post::where('title','Title two')->get();
        
            return view('home')->with('posts',$posts);
        }
        

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('posts.create');
        
    }

    /**
     * Store a newly created resource in stor/age.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //It get the form values and store in the database
        //This code is to check the input field if empty
        $this->validate($request,[
            'phone_number'=>'required',
            'address'=>'required',
            'category'=>'required',
            'item_name'=>'required',
            'item_desc'=>'required',
            'item_image'=>'image|nullable|max:1999'
        ], ['Phone_number.required' => 'Phone Number required', 'address.required'=>'Address required', 'category.required'=>'Category required', 'item_name.required'=> 'Item name required', 'item_desc.required'=>'Item description required' ]);
        //Handle file upload
        if ($request->hasFile('item_image')) {
            //Get file with extension
            $fileNameWithExt = $request->file('item_image')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('item_image')->getClientOriginalExtension();
            //File to store
            $fileNameToStore =  $filename.'_'.time().'.'.$extension;
            //Upload the image
            $path = $request->file('item_image')->storeAs('public/item_images', $fileNameToStore);

        } else {
            $fileToStore = 'noImage.jpg';
        }
        

        // To post our values to the database
        // $user_name = auth()->user()->name;
        // $user_email = auth()->user()->email;
        // $user_name_id = User::find($user_name);
        // $user_email_id = User::find($user_email);
        $post = new ReportMisingItems;
        $post-> name = Auth::user()->name;
        $post-> email = Auth::user()->email;
        $post-> phone_number = $request->input('phone_number');
        $post-> address = $request->input('address');
        $post-> category = $request->input('category');
        $post -> item_name = $request->input('item_name');
        $post-> item_desc = $request->input('item_desc');
        $post-> item_image = $fileNameToStore;
        $post-> status = 0;
        $post->save();

        return redirect('/Posts')->with('success','Report was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //It get the id of a row and display all the properties

        // $post = ReportMisingItems::find($id);
        // return view('posts.show')->with('post',$post);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = ReportMisingItems::find($id);
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);
        // To post our values to the database
        $post = ReportMisingItems::find($id);
        $post -> title = $request->input('title');
        $post-> body = $request->input('body');
        $post->save();
        return redirect('/Posts')->with('success','Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = ReportMisingItems::find($id);
        $post->delete();
        return redirect('/Posts')->with('success','Report Removed successfully');
    }
    public function transferToggle(Request $request){

        $id = $request->input('id');
        $row = ReportMisingItems::find($id);
        if($row == "1")
        {

        }
        else{

        $row->status = "1";
        $row->save();

        $msg = $row;

        return response()->json(['msg'=>$msg], 200);
        }

    }
}
