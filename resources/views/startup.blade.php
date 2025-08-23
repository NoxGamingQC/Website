@extends('layouts.pages.app')
@section('title', 'Startup')
@section('content')

<div class="container text-justify my-auto">
    <div class="row py-5 align-items-center">
        <div class="col">
            <h2 class="text-center">
                <b class="display-1 developper-font">{{$appName}}</b>
            </h2>
            
            <div class="input-group mb-3">
                <input id="searchInput" type="text" class="form-control form-control-lg" placeholder="{{trans('startup.search_placeholder')}}" style="box-shadow: 0 0 0 0.25rem transparent" />
                <button id="submitSearch" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> </button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(() => {
            $('#searchInput').focus();
        }, "1000");
    })

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
        var searchString = $('#searchInput').val();
        if(isValidHttpUrl(searchString)) {
            window.location.href = searchString;
        } else {
            window.location.href = ('https://www.google.com/search?q=' + searchString);
        }
    }

    function isValidHttpUrl(string) {
        let url;
        
        try {
            url = new URL(string);
        } catch (_) {
            return false;  
        }

        return url.protocol === "http:" || url.protocol === "https:";
    }
</script>
@endsection