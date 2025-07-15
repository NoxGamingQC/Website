@extends('layouts.pages.app')
@section('title', 'Startup')
@section('content')

<div class="container text-justify my-auto">
    <div class="row py-5 align-items-center">
        <div class="col">
            <h2>
                <b class="display-4">Bienvenue</b>
                <br />
                <small class="text-body-secondary">Que voulez vous rechercher sur le web aujourd'hui?</small>
            </h2>
            
            <div class="input-group mb-3">
                <input id="searchInput" type="text" class="form-control" />
                <button id="submitSearch" class="btn btn-primary">Rechercher</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#submitSearch').on('click', function() {
        submitSearch();
    });

    document.onkeydown=function(evt){
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if(keyCode == 13)
        {
            submitSearch();
        }
    }

    function submitSearch() {
        window.location.href = ('https://www.google.com/search?q=' + $('#searchInput').val());
    }
</script>
@endsection