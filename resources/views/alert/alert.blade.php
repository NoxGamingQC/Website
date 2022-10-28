
@if (Session::has('success'))
<div class="row alert alert-success alert-dismissible" role="alert">
    <div class="col-md-12">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Success !</strong> {{ session('success') }}
    </div>
</div>
@endif