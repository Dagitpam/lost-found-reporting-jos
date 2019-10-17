@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
            <h1>Create page</h1>
        {{-- {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
         <div class="form-group">
            {{form::label('title','Title')}}
            {{form::text('title',$post->title, ['class'=> 'form-control', 'placeholder'=>'Title'] )}}
         </div>
         <div class="form-group">
                {{form::label('body','Body')}}
                {{form::textarea('body',$post->body, ['id'=>'article-ckeditor','class'=> 'form-control', 'placeholder'=>'Body text'] )}}
         </div>
         {{form::('_method','PUT')}}
         {{form::submit('Submit',['class'=>'btn btn-outline-primary btn-lg'])}}
     {!! Form::close() !!} --}}
        <form action="/Posts/{{$post->id}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
        <input type="text" value="{{$post->title}}" id="title" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label for="body">Title</label>
            {{-- <input type="text" value="{!!$post->Body!!}" id="article-ckeditor" class="form-control" placeholder="Enter title">     --}}
            <input type="text" value="{{$post->Body}}"  class="form-control" name="body">
       </div>
       @method('PUT')
       <input type="submit" class="btn btn-info btn-lg">
    </form>
    </div>
    <div class="col-md-3"></div>
</div>     
@endsection