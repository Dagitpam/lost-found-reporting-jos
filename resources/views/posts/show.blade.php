@extends('layouts.app')
@section('content') <br>
<a href="/Posts" class="btn btn-warning">Go back</a><br>
<h1>{{$post->title}}</h1>
<div>
    {{{$post->Body}}}
</div> <hr>
<small>Writting on {{$post->created_at}}</small>  
@endsection