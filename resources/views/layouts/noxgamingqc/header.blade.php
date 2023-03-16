@if(isset($kiosk) && $kiosk == true)
    @if($recipe == true)
        <div class="header" style="height:480px !important;">
            <div class="text-right" style="margin-right:5%;">
                <br />
                <h2 id="currentTime"></h2>
            </div>
            <div class="row text-center" style="padding-top: 100px;">
                <h1 class="text-highlight" style="font-size:65px">@yield('name')</h1>
                <br />
                <h3 class="raleway-font text-highlight" style="margin-left:5%;max-width:90%">@yield('slogan')</h3>
                @if($isRecipe == true)
                    @if(!isset($add_mode))
                        <h4 class="raleway-font text-highlight" style="margin-left:5%;max-width:90%">{{ trans('cookbook.by'). ' ' }}@yield('author')</h4>
                    @endif
                @endif
                <br />
            </div>
        </div>
        <script>
            $(document).ready(function() {
                updateClock()
            });

            function updateClock() {
                var time = new Date();
                $('#currentTime').html(('0' + time.getHours()).slice(-2) + ':' + ('0' + time.getMinutes()).slice(-2) + ':' + ('0' + time.getSeconds()).slice(-2))
                setTimeout(updateClock, 1000);
            }
            
        </script>
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
                            @if(!isset($add_mode))
                                <h4 class="raleway-font">{{trans('cookbook.prep_time')}}: @yield('prep_time')</h4>
                                <h4 class="raleway-font">{{trans('cookbook.cook_time')}}: @yield('cook_time')</h4>
                                <h4 class="raleway-font">{{trans('cookbook.yields')}}:  @yield('yields')</h4>
                            @else
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="raleway-font text-right"><span>{{trans('cookbook.recipe_name')}} (FR):</span></h4>
                                    </div>
                                    <div class="col-md-9">
                                        <h4 class="raleway-font"><input id="recipeNameFR" type="text" class="form-control"></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="raleway-font text-right"><span>{{trans('cookbook.recipe_name')}} (EN):</span></h4>
                                    </div>
                                    <div class="col-md-9">
                                        <h4 class="raleway-font"><input id="recipeNameEN" type="text" class="form-control"></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="raleway-font text-right"><span>{{trans('cookbook.author')}}:</span></h4>
                                    </div>
                                    <div class="col-md-9">
                                        <h4 class="raleway-font"><input id="author" type="text" class="form-control"></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="raleway-font text-right"><span>{{trans('cookbook.prep_time')}}:</span></h4>
                                    </div>
                                    <div class="col-md-9">
                                        <h4 class="raleway-font"><input id="prepTime" type="text" class="form-control"></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="raleway-font text-right"><span>{{trans('cookbook.cook_time')}}:</span></h4>
                                    </div>
                                    <div class="col-md-9">
                                        <h4 class="raleway-font"><input id="cookTime" type="text" class="form-control"></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="raleway-font text-right"><span>{{trans('cookbook.yields')}}:</span></h4>
                                    </div>
                                    <div class="col-md-9">
                                        <h4 class="raleway-font"><input id="result" type="text" class="form-control"></h4>
                                    </div>
                                </div>
                            @endif
                            <hr style="border-color:white" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @if(!isset($add_mode))
                                <h4 class="raleway-font">@yield('description')</h4>
                            @else
                                <textarea id="descriptionFR" type="text" class="form-control" rows="4" placeholder="{{trans('cookbook.add_description')}} (FR)"></textarea>
                                <br />
                                <br />
                                <textarea id="descriptionEN" type="text" class="form-control" rows="4" placeholder="{{trans('cookbook.add_description')}} (EN)"></textarea>
                            @endif
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