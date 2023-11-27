<div class="cookbook">
    @if($recipe == true)
        <div class="header no-print">
            <div class="text-right" style="margin-right:5%;">
                <br />
                <h2 id="currentTime"></h2>
            </div>
            <div class="row text-center" style="padding-top: 100px;">
                <h1 style="font-size:65px">@yield('name')</h1>
                <br />
                <h3 style="margin-left:5%;max-width:90%">@yield('slogan')</h3>
                @if($isRecipe == true)
                    @if(!isset($add_mode))
                        <h4 style="margin-left:5%;max-width:90%">{{ trans('cookbook.by'). ' ' }}@yield('author')</h4>
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
            <div class="container no-print">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <br />
                        <a href="{{ $lastLink }}"><input class="btn btn-primary form-control" style="font-size:24px;padding:5%" value="{{trans('cookbook.go_back_to_last_page')}}" readonly></a>
                        <br />
                        <br />
                    </div>
                </div>
                @yield('kiosk-button')
            </div>
            @if($isRecipe == true)
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-center raleway-font print headline" style="display:none">@yield('name')<small> {{trans('cookbook.by')}} @yield('author')</small></h2>
                            <hr class="print" style="display:none;border-color:black" />
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
                                        <h4 class="raleway-font"><input id="recipeNameFR" type="text" class="form-control" value="{{isset($recipe) && $recipe !== true ? $recipe->name_fr : ''}}"></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="raleway-font text-right"><span>{{trans('cookbook.recipe_name')}} (EN):</span></h4>
                                    </div>
                                    <div class="col-md-9">
                                        <h4 class="raleway-font"><input id="recipeNameEN" type="text" class="form-control" value="{{isset($recipe) && $recipe !== true ? $recipe->name_en : ''}}"></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="raleway-font text-right"><span>{{trans('cookbook.author')}}:</span></h4>
                                    </div>
                                    <div class="col-md-9">
                                        <h4 class="raleway-font"><input id="author" type="text" class="form-control" value="{{isset($recipe) && $recipe !== true ? $recipe->created_by : ''}}"></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="raleway-font text-right"><span>{{trans('cookbook.prep_time')}}:</span></h4>
                                    </div>
                                    <div class="col-md-9">
                                        <h4 class="raleway-font"><input id="prepTime" type="text" class="form-control" value="{{isset($recipe) && $recipe !== true ? $recipe->prep_time : ''}}"></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="raleway-font text-right"><span>{{trans('cookbook.cook_time')}}:</span></h4>
                                    </div>
                                    <div class="col-md-9">
                                        <h4 class="raleway-font"><input id="cookTime" type="text" class="form-control" value="{{isset($recipe) && $recipe !== true ? $recipe->cook_time : ''}}"></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="raleway-font text-right"><span>{{trans('cookbook.yields')}}:</span></h4>
                                    </div>
                                    <div class="col-md-9">
                                        <h4 class="raleway-font"><input id="result" type="text" class="form-control" value="{{isset($recipe) && $recipe !== true ? $recipe->result : ''}}"></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="raleway-font text-right"><span>{{trans('cookbook.category')}}:</span></h4>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="selectpicker" title="{{trans('cookbook.category')}}">
                                            @if(app()->getLocale() === 'fr-ca')
                                                @foreach($categories as $key => $category)
                                                    <option class="category" value="{{$category->id}}" {{isset($recipe) && $recipe !== true ? ($recipe->category_id == $category->id ? 'selected' : '') : ''}}>{{$category->name_fr}}</option>
                                                @endforeach
                                            @else
                                                @foreach($categories as $key => $category)
                                                    <option class="category" value="{{$category->id}}" {{isset($recipe) && $recipe !== true ? ($recipe->category_id == $category->id ? 'selected' : '') : ''}}>{{$category->name_en}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-9">
                                            <h5 class="raleway-font text-right"><span>{{trans('cookbook.is_blw')}}:</span></h5>
                                        </div>
                                        <div class="col-md-3">
                                            <h5 class="raleway-font"><input id="isBLW" type="checkbox" class="form-control" {{ isset($recipe) && $recipe !== true ? ($recipe->is_blw ? 'checked' : '') : ''}}></h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-9">
                                            <h5 class="raleway-font text-right"><span>{{trans('cookbook.has_alcohol')}}:</span></h5>
                                        </div>
                                        <div class="col-md-3">
                                            <h5 class="raleway-font"><input id="hasAlcohol" type="checkbox" class="form-control" {{ isset($recipe) && $recipe !== true ? ($recipe->has_alcohol  ? 'checked' : '') : ''}}></h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <hr style="border-color:white" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @if(!isset($add_mode))
                                <h4 class="raleway-font headline">@yield('description')</h4>
                            @else
                                <textarea id="descriptionFR" type="text" class="form-control" rows="4" placeholder="{{trans('cookbook.add_description')}} (FR)">{{isset($recipe) && $recipe !== true ? $recipe->description_fr : ''}}</textarea>
                                <br />
                                <br />
                                <textarea id="descriptionEN" type="text" class="form-control" rows="4" placeholder="{{trans('cookbook.add_description')}} (EN)">{{isset($recipe) && $recipe !== true ? $recipe->description_en : ''}}</textarea>
                            @endif
                            <hr style="border-bottom: solid 3px" />
                        </div>
                    </div>
                </div>
            @endif
        @endif
    @else
        <div class="header" style="height:480px !important;background-color:#{{$theme->primary}};background: linear-gradient(220deg, #{{$theme->primary}}, #{{$theme->background}});">
            <div class="row text-center">
                <h1 class="text-highlight headline">@yield('title')</h1>
                <br />
                <h3 class="raleway-font text-highlight headline" style="margin-left:5%;max-width:90%">@yield('slogan')</h3>
                <br />
            </div>
        </div>
    @endif
</div>
