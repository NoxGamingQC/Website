@extends('layouts.noxgamingqc.app')
@section('content')

@if(app()->getLocale() === 'fr-ca')
    @section('name', $category->name_fr)
    @section('slogan', $category->description_fr ? $category->description_fr : '')
@else
    @section('name', $category->name_en)
    @section('slogan', $category->description_en ? $category->description_en : '')
@endif

<div class="container">
    @auth
        @if(Auth::user()->isAdmin || Auth::user()->isModerator || Auth::user()->isDev)
            <div class="row">
                <div class="col-md-12">
                     <a href="/{{app()->getLocale()}}/recipe/add"><input class="btn btn-success form-control" style="font-size:24px;padding:5%" value="{{trans('cookbook.add_recipe')}}" readonly></a>
                    <br />
                    <br />
                </div>
            </div>
        @endif
    @endauth
    <div class="row">
        @if(count($recipes) > 0)
            @if(app()->getLocale() === 'fr-ca')
                @foreach($recipes as $key => $recipe)
                    <div class="col-sm-4 text-center" style="margin-bottom:3%">
                        <a href="/{{app()->getLocale()}}/kiosk/recipe/{{$recipe->id}}{{isset($kiosk_key) ? '?kiosk_key=' . $kiosk_key : ''}}"><input class="btn btn-primary form-control" style="font-size:18px;padding:15%" value="{{$recipe->name_fr}}" readonly></a>
                    </div>
                @endforeach
            @else
                @foreach($recipes as $key => $recipe)
                    <div class="col-sm-4 text-center" style="margin-bottom:3%">
                        <a href="/{{app()->getLocale()}}/kiosk/recipe/{{$recipe->id}}{{isset($kiosk_key) ? '?kiosk_key=' . $kiosk_key : ''}}"><input class="btn btn-primary form-control" style="font-size:18px;padding:15%" value="{{$recipe->name_en}}" readonly></a>
                    </div>
                @endforeach
            @endif
        @else
            <br />
            <br />
            <h3 class="raleway-font text-center">{{trans('cookbook.no_recipe_available')}}</h3>
            <br />
            <br />
            <br />
            <br />
        @endif
    </div>
</div>
@if(isset($redirect))
    <script type="text/javascript">
        $(document).ready(function() {
            window.location.href = "{{$redirect}}"
        })
    </script>
@endif
@endsection