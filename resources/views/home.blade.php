@extends('layouts.app')

@section('content')
<div class="container"><br><br>
    <div class="card text-center">
            <h4>Welcome to Report and Found Management System.</h4>
            <p class="text-danger"><b>*You can either report missing items or found items. We span within the confine of PLASU*</b></p>
        </div>
        <div class="container text-center">
            <div class="spinner-grow text-muted"></div>
            <div class="spinner-grow text-primary"></div>
            <div class="spinner-grow text-success"></div>
            <div class="spinner-grow text-info"></div>
            <div class="spinner-grow text-warning"></div>
            <div class="spinner-grow text-danger"></div>
            <div class="spinner-grow text-secondary"></div>
            <div class="spinner-grow text-muted"></div>
            <div class="spinner-grow text-primary"></div>
            <div class="spinner-grow text-success"></div>
            <div class="spinner-grow text-info"></div>
            <div class="spinner-grow text-warning"></div>
            <div class="spinner-grow text-danger"></div>
            <div class="spinner-grow text-secondary"></div>
        </div>
    <div class="row justify-content-center">
    
        <div class="col-md-12">
                <div class="card-body">
                 @if (count($posts) > 0)
                 <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-md-4">
                        <div class="card">
                    <div class="card-header"><h3><a href="/Posts/{{$post->id}}">{{$post->item_name}}</a></h3></div>
                                    <img style="width:60%; height: 10%" class="card-img-top" src="/storage/item_images/{{$post->item_image}}" alt="images"><br>
                                {{-- <input type="text" value="{{$post->item_name}}" id="item_name" readonly>
                                <input type="text" value="{{$post->item_desc}}" id="item_desc" readonly> --}}
                                    {{-- <button type="button" class="btn btn-warning btn-sm text-black" data-toggle="modal2" data-target="#myModal">
                                        Claim
                                      </button> --}}
                                <div class="card-body">
                                <small><b>Posted by:</b>&nbsp;{{$post->name}}</small><br>
                                <small><b>Contact:</b>&nbsp;{{$post->phone_number}}</small><br>
                              <small><b>Date:</b>&nbsp;{{$post->created_at}}</small><br>
                              <a href="/Found/create" class="btn btn-sm btn-warning float-right ">Found?</a>
                            </div>
                        </div>
                    </div> 
                    @endforeach
                </div><br>
                 {{$posts->links()}}
                @else
                    <p>No Record found</p>
                @endif

                   
                </div>
            </div>
        </div>
{{-- Passing item_name and item-desc to modal form as hidden value --}}
{{-- <script>

    function transfer(a){
        var a;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            $.ajax({
                url:"/tSelect",
                method: "POST",
                cache: false,
                data: {id: a},
                success: function(result){
                    // alert(result.msg);
                    document.getElementById('item_name2').value = result.item_name;
                    document.getElementById('item_desc2').value = result.item_desc;
                },
                error:function(){
                    alert('fuck');
                }
            });
    };




        // function transfer(){
        //     let itemName_final = document.querySelector("#item_name");
        //     let itemDesc_final = document.querySelector("#item_desc");
        //     let itemName = document.querySelector("#item_name2");
        //     let itemDesc = document.querySelector("#item_desc2");


        //     itemName.value = itemName_final.value;
        //     itemDesc.value = itemDesc_final.value;
        // }
    </script> --}}
@endsection
