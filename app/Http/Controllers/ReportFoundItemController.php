<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\AUTH;
use App\User;
Use App\ReportFoundItems;

class ReportFoundItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = ReportFoundItems::orderBy('created_at','desc')->paginate(5);
        //To select a particular field with where
        //$posts = Post::where('title','Title two')->get();
    
        return view('posts.view_found_items')->with('posts',$posts);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('posts.report_found_item');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'phone_number'=>'required',
            'address'=>'required',
            'category'=>'required',
            'item_name'=>'required',
            'item_desc'=>'required',
            'item_image'=>'image|nullable|max:1999'
        ],['Phone_number.required' => 'Phone Number required', 'address.required'=>'Address required', 'category.required'=>'Category required', 'item_name.required'=> 'Item name required', 'item_desc.required'=>'Item description required']);
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
            $path = $request->file('item_image')->storeAs('public/item_images',$fileNameToStore);

        } else {
            $fileToStore = 'noImage.jpg';
        }
        $post = new ReportFoundItems;
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

        return redirect('/Found')->with('success','Report was sent successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
