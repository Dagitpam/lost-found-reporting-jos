<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Here we are bringin the model
use App\Post;
//Not using Eloquent
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
        $posts = Post::orderBy('title','desc')->paginate(1);
        //To select a particular field with where
        //$posts = Post::where('title','Title two')->get();

        return view('posts.index')->with('posts',$posts);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //It get the form values and store in the database
        //This code is to check the input field if empty
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);
        // To post our values to the database
        $post = new Post;
        $post -> title = $request->input('title');
        $post-> body = $request->input('body');
        $post->save();

        return redirect('/Posts')->with('success','Post Create successfully');
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

        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
        
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
    }
}
