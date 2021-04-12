@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissable fade show" role="alert">
    <strong>{{ $message }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>   
</div>
@endif
  
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissable fade show" role="alert">
    <strong>{{ $message }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>   
</div>
@endif