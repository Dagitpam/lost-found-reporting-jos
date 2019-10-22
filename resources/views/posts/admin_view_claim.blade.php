@extends('layouts.app_admin')

@section('content2')
<div class="container"><br><br>
     @if (count($claims) > 0)
     <div class="table-responsive">
                <table class="table table-info table-hover table-stripped">
                        <thead>
                            
                             <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Item Name</th>
                            <th>Description</th>
                            <th>Claim Desc</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                    @foreach ($claims as $claim)
                        
                        <td>{{$claim->name}}</td>
                        <td>{{$claim->email}}</td>
                        <td>{{$claim->phone_number}}</td>
                        <td>{{$claim->item_name}}</td>
                        <td>{{$claim->initial_desc}}</td>
                        <td>{{$claim->claim_desc}}</td>
                        <td>
                        <form action="/ClaimF/{{$claim->id}}" method="post">
                            @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">delete</button>
                        </form>
                        </td>   
                    
                        </tbody>
    
                    @endforeach
                    <tfoot>
                        <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Item Name</th>
                            <th>Description</th>
                            <th>Claim Desc</th>
                            <th>Action</th>
                    </tfoot>
                </table>  
     </div>
                @endif
                {{$claims->links()}}
          
    
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
