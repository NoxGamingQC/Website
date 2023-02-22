@if(isset($kiosk) && $kiosk == true)
    @if($recipe == true)
        <div class="header" style="height:480px !important;">
            <div class="row text-center">
                <h1 class="text-highlight" style="font-size:65px">@yield('name')</h1>
                <br />
                <h3 class="raleway-font text-highlight" style="margin-left:5%;max-width:90%">@yield('slogan')</h3>
                @if($isRecipe == true)
                    <h4 class="raleway-font text-highlight" style="margin-left:5%;max-width:90%">{{ trans('cookbook.by'). ' ' }}@yield('author')</h4>
                @endif
                <br />
            </div>
        </div>
        @if(!isset($isButtonLastPage) || $isButtonLastPage === 'true')
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <br />
                        <a href="{{ $lastLink }}"><input class="btn btn-primary form-control" style="font-size:24px;padding:5%" value="{{trans('cookbook.go_back_to_last_page')}}" readonly></a>
                        <br />
                        <br />
                    </div>
                </div>
            </div>
            @if($isRecipe == true)
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <hr style="border-color:white" />
                            <h4 class="raleway-font">{{trans('cookbook.prep_time')}}: @yield('prep_time')</h4>
                            <h4 class="raleway-font">{{trans('cookbook.cook_time')}}: @yield('cook_time')</h4>
                            <h4 class="raleway-font">{{trans('cookbook.yields')}}:  @yield('yields')</h4>
                            <hr style="border-color:white" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="raleway-font">@yield('description')</h4>
                            <hr style="border-bottom: solid 3px" />
                        </div>
                    </div>
                </div>
            @endif
        @endif
    @else
        <div class="header" style="height:480px !important;">
            <div class="row text-center">
                <h1 class="text-highlight">@yield('title')</h1>
                <br />
                <h3 class="raleway-font text-highlight" style="margin-left:5%;max-width:90%">@yield('slogan')</h3>
                <br />
            </div>
        </div>
    @endif
@else
<div class="header">
    <div class="row text-center">
        <h1 class="text-highlight">@yield('title')</h1>
        <br />
        <h3 class="raleway-font text-highlight" style="margin-left:5%;max-width:90%">@yield('slogan')</h3>
        <br />
    </div>
</div>
@endif