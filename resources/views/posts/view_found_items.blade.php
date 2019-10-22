@extends('layouts.app')

@section('content')
<div class="container"><br><br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                 <div class="card-header bg-danger text-white">List of Found items</div> 

                <div class="card-body">
                 @if (count($posts) > 0)
                 <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-md-4">
                        <div class="card">
                         <div class="card-header"><h3><a href="/Posts/{{$post->id}}">{{$post->item_name}}</a></h3></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img width="100%" src="/storage/item_images/{{$post->item_image}}" alt="images"><br>
                                    <button type="button" class="btn btn-warning btn-sm text-white" onclick="transfer({{$post->id}})" data-toggle="modal" data-target="#myModal">
                                        Claim
                                      </button>
                                </div>
                                <div class="col-md-6">
                                <small><b>Posted by:</b>&nbsp;{{$post->name}}</small><br>
                                <small><b>Contact:</b>&nbsp;{{$post->phone_number}}</small><br>
                              <small><b>Date:</b>&nbsp;{{$post->created_at}}</small>
                              
                                </div>
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
    </div>
</div>
{{-- Passing item_name and item-desc to modal form as hidden value --}}
<script>
    

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
    </script>
@endsection
