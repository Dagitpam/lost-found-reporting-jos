@extends('layouts.app_admin')

@section('content2')
<div class="container"><br><br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                 <div class="card-header bg-danger text-white">List of Users</div> 

                <div class="card-body">
                @if (count($user_list) > 0)
                <div class="table-responsive">
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
                        <td><button type="submit" class="btn btn-info btn-sm" onclick="transfer({{$user->id}})" data-toggle="modal" data-target="#myModal2">Edit</button>&nbsp;
                        <form action="/destroy/{{$user->id}}" method="post">
                            @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">delete</button>
                        </form>
                        </td>   
                    
                        </tbody>
    
                    @endforeach
                    <tfoot>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tfoot>
                </table> 
            </div> 
                @endif
                </div>
                {{$user_list->links()}}
            </div>
        </div>
    </div>
    
</div>
<!-- User update modal -->
<div class="modal fade" id="myModal2">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header bg-danger text-white">
          <h4 class="modal-title">Update User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                @include('inc.messages')
          <form action="/destroy/{{$user->id}}" method="post"> 
            @csrf
              <div class="form-group">
                  <label for="name ">User Name</label>
                  <input type="text" id="user_name2" name="name" class="form-control">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="user_email" name="email" class="form-control">
            </div>
            <!-- Modal footer -->
           <div class="modal-footer">
             @method('PUT')
            <button type="Submit" class="btn btn-danger">Update</button>
           </div>
          </form>
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
                url:"/editUser",
                method: "POST",
                cache: false,
                data: {id: a},
                success: function(result){
                    // alert(result.msg);
                    document.getElementById('user_name2').value = result.name;
                    document.getElementById('user_email').value = result.email;
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
