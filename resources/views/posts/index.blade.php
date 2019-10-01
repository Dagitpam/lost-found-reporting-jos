@extends('layouts.app')

@section('content')
@if (count($posts) > 0)

    @foreach ($posts as $post)
        <div class="jumbotron">
        <h3><a href="/Posts/{{$post->id}}">{{$post->title}}</a></h3>
        <small>{{$post->created_at}}</small>
        </div>
        
    @endforeach
        {{$posts->links()}}
@else
    <p>No Record found</p>
@endif
    
@endsection