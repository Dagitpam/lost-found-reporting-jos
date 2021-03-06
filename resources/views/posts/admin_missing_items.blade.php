@extends('layouts.app_admin')

@section('content2')
<br><br>
    {{-- <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                 <div class="card-header bg-danger text-white">List of Users</div> 

                <div class="card-body"> --}}
                    <h3>View and Approve Missing Items</h3>
                @if (count($missing_items) > 0)
                <div class="table-responsive">
                <table class="table table-info table-hover table-stripped table-bordered">
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Address</th>
                            <th>Category</th>
                            <th>Item_name</th>
                            <th>Item_desc</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                    @foreach ($missing_items as $missing_item)
                        
                
                        <td>{{$missing_item->name}}</td>
                        <td>{{$missing_item->email}}</td>
                        <td>{{$missing_item->phone_number}}</td>
                        <td>{{$missing_item->address}}</td>
                        <td>{{$missing_item->category}}</td>
                        <td>{{$missing_item->item_name}}</td>
                        <td>{{$missing_item->item_desc}}</td>
                        @if ($missing_item->status == "0")
                        <td class="text-danger" id="pending">Pending</td>
                        @else
                        <td>Completed</td>
                        @endif
                        <td><button type="button" class="btn btn-info btn-sm text-white" onclick="toggle('{{$missing_item->id}}')">Approve</button>&nbsp;
                        <form action="/Posts/{{$missing_item->id}}" method="post">
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
                        <th>Phone number</th>
                        <th>Address</th>
                        <th>Category</th>
                        <th>Item_name</th>
                        <th>Item_desc</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tfoot>
                </table> 
                </div> 
                @endif
                {{-- </div> --}}
                {{$missing_items->links()}}
            {{-- </div>
        </div>
    </div> --}}
    <script>
    

            function toggle(a){
                var a;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                    $.ajax({
                        url:"/tToggle",
                        method: "POST",
                        cache: false,
                        data: {id: a},
                        success: function(result){
                            // alert(result.msg);
                         document.getElementById('pending').innerHTML = "Completed";
                            // document.getElementById('item_desc2').value = result.item_desc;
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
