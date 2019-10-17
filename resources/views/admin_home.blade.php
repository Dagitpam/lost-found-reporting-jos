@extends('layouts.app_admin')

@section('content2')
<div class="container"><br><br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                 <div class="card-header bg-danger text-white">List of Users</div> 

                <div class="card-body">
                @if (count($user_list) > 0)
                <table class="table table-info table-hover table-stripped">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                    @foreach ($user_list as $user )
                        
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><button type="submit" class="btn btn-info btn-sm">Edit</button>&nbsp;<button type="submit" class="btn btn-danger btn-sm">delete</button></td>
                    
                        </tbody>
    
                    @endforeach
                    <tfoot>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tfoot>
                </table>  
                @endif
                </div>
                {{$user_list->links()}}
            </div>
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
