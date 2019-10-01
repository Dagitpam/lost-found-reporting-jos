@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
            <h1>Create page</h1>
        {!! Form::open(['action'=> 'PostsController@store', 'method' => 'POST']) !!}
         <div class="form-group">
            {{form::label('title','Title')}}
            {{form::text('title','', ['class'=> 'form-control', 'placeholder'=>'Title'] )}}
         </div>
         <div class="form-group">
                {{form::label('body','Body')}}
                {{form::textarea('body','', ['id'=>'article-ckeditor','class'=> 'form-control', 'placeholder'=>'Body text'] )}}
         </div>
         {{form::submit('Submit',['class'=>'btn btn-outline-primary btn-lg'])}}
     {!! Form::close() !!}
    </div>
    <div class="col-md-3"></div>
</div>


    
@endsection