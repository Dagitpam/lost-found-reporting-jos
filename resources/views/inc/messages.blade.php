@if (count($errors)>0)
    @foreach ($errors->all() as $error )
    <div class="alert alert-danger">
        {{$error}}
    </div>
    
    @endforeach
    
@endif

@if (session('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{session('success')}}</strong>
  </div>
        

    
@endif
@if (session('error'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{session('error')}}</strong>
  </div>
    
@endif