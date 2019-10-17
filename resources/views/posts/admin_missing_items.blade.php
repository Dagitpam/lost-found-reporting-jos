@extends('layouts.app_admin')

@section('content2')
<br><br>
    {{-- <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                 <div class="card-header bg-danger text-white">List of Users</div> 

                <div class="card-body"> --}}
                @if (count($missing_items) > 0)
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
                        <td class="text-danger">Pending</td>
                        @else
                        <td>Completed</td>
                        @endif
                        <td><button type="submit" class="btn btn-info btn-sm">Approve</button>&nbsp;<button type="submit" class="btn btn-danger btn-sm">delete</button></td>
                    
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
                @endif
                {{-- </div> --}}
                {{$missing_items->links()}}
            {{-- </div>
        </div>
    </div> --}}
@endsection
