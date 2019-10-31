@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
            <h1>Report missing item</h1>
        {{-- {!! Form::open(['action'=> 'PostsController@store', 'method' => 'POST']) !!}
         <div class="form-group">
            {{form::label('title','Title')}}
            {{form::text('title','', ['class'=> 'form-control', 'placeholder'=>'Title'] )}}
         </div>
         <div class="form-group">
                {{form::label('body','Body')}}
                {{form::textarea('body','', ['id'=>'article-ckeditor','class'=> 'form-control', 'placeholder'=>'Body text'] )}}
         </div>
         {{form::submit('Submit',['class'=>'btn btn-outline-primary btn-lg'])}}
     {!! Form::close() !!} --}}
     <div class="card">
         <div class="card-header bg-danger text-white">Report</div>
         <div class="card-body">
            <form action="/Posts" method="post" enctype="multipart/form-data">
                @csrf
            {{-- <input type="text" value="{{Auth::user()->name}}" id="title" class="form-control">
            <input type="text" value="{{Auth::user()->email}}" id="title" class="form-control"> --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label for="title">Phone number</label>
                        <input type="number" name="phone_number" id="title" class="form-control" placeholder="e.g 09012704402">
                    </div>
             
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Address</label>
                        <input type="text" name="address" id="title" class="form-control" placeholder="e.g Anglo jos, opp. former Itel">
                    </div>
              
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label for="title">Item category</label>
                        <select name="category" id="selected" class="form-control">
                            <option value="">---Choose category---</option>
                            <option value="Books">Books</option>
                            <option value="Documents">Documents</option>
                            <option value="ATMs">ATMs card</option>
                            <option value="Gagets">Gagets</option>
                        </select>
                    </div>
             
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Item name</label>
                        <input type="text" name="item_name" id="title" class="form-control" placeholder="e.g laptop bag">
                    </div>
              
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Upload image <small class="text-muted">(Optional)</small></label>
                        <input type="file" name="item_image" id="title" class="form-control">
                        <small class="form-text  text-danger">Image most be equals to or less than 2mb </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="body">Description</label>
                        <input type="text" name="item_desc" id="title" class="form-control" placeholder="Description">
                        {{-- <Textarea id="article-ckeditor" name="item_desc" id="body"></Textarea>        --}}
                   </div>
                </div>
            </div>
                
               <input type="submit" class="btn btn-danger btn-lg" value="Report">
            </form>
         </div>
     </div>
    </div>
    <div class="col-md-1"></div>
</div>    

@endsection