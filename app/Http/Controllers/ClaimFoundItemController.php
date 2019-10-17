<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\AUTH;
use App\ClaimFoundItem;
use App\ReportFoundItems;

class ClaimFoundItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'claim_desc'=>'required'
        ],['phone_number.required'=>'phone number is required', 'claim_desc.required'=>'Item description is required']);
        $post= new ClaimFoundItem;
        $post-> name = Auth::user()->name;
        $post-> email = Auth::user()->email;
        $post-> phone_number = $request->input('phone_number');
        $post-> item_name = $request->input('item_name');
        $post-> initial_desc = $request->input('initial_desc');
        $post-> claim_desc = $request->input('claim_desc');
        $post->save();
        return redirect('/Found')->with('success','Claim was created successfully');
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
    public function transferSelect(Request $request){

        $id = $request->input('id');
        $claim = ReportFoundItems::find($id);

        $item_name =$claim->item_name;
        $item_desc=$claim->item_desc;

        $results = array(
            'item_name' => $item_name,
            'item_desc' =>$item_desc,
            'error'=>'error'
        );
        $msg = $item_name;

        return response()->json($results, 200);
    }
}
