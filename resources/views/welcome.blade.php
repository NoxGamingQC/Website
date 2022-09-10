@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<div class="row">
    <div class="col-md-12 text-center full-height" id="title">
        <div class="panel panel-block-primary">
            <div class="panel-body" style="padding: 5%">
                <h1 class="raleway-font text-highlight">NoxGamingQC</h1>
                <br />
                <hr class="hr-highlight"/>
                <br />
                <h5 class="raleway-font text-highlight" style="font-size: 18px">Rest in peace your majesty Queen Elizabeth II</h5>
                <h5 class="raleway-font text-highlight" style="font-size: 18px">1926 - 2022</h5>
                <!--<h5 class="raleway-font" style="font-size: 18px">{trans('welcome.slogan')}</h5>-->
                <br />
                <!--include('layouts.socials')-->

            </div>
        </div>
    </div>
     <div class="col-md-12" id="instagram-feed">
        <div id="curator-feed-default-feed-layout">
            <a href="" target="_blank" class="crt-logo crt-tag"></a>
        </div>
        <div class="text-center">
            <a class="btn btn-primary" type="button" href="https://www.instagram.com/noxgamingqc/">{{trans('generic.see_more')}}</a>
        </div>
        <br />
        <hr />
    </div>
    <div class="col-md-12">
        @include('layouts.contactForm')
    </div>
</div>
<script type="text/javascript">
    (function(){
        var i, e, d=document, s="script";
        i=d.createElement("script");
        i.async=1;
        i.charset="UTF-8";
        i.src="https://cdn.curator.io/published/e20a68dc-3467-45c4-87cd-dcd6c14a133a.js";
        e=d.getElementsByTagName(s)[0];
        e.parentNode.insertBefore(i, e);
    })();
</script>
@stop
