@extends('layouts.noxgamingqc.app')
@section('title', trans('config.website_settings'))
@section('content')

<div class="row">
    <div class="col-md-12 content-item">
        <div class="container">
            <h2>{{trans('config.headline_settings')}}</h2>
            <hr />
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{trans('config.headline01')}}</label>
                    <input type="text" id="headline01" class="form-control" value="{{$headline['headline01']}}" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{trans('config.headline02')}}</label>
                    <input type="text" id="headline02" class="form-control" value="{{$headline['headline02']}}" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{trans('config.headline_hr')}}</label>
                    <input type="checkbox" id="headlineHr" {{$headline['headlineHr'] === 'true' ? 'checked' : ''}}>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{trans('config.headline_socials')}}</label>
                    <input type="checkbox" id="headlineSocials" {{$headline['headlineSocials'] === 'true' ? 'checked' : ''}}>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 content-item bg-dark">
        <div class="container">
            <h2>{{trans('config.theme_settings')}}</h2>
            <hr />
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{trans('config.theme')}}</label>
                    <select class="selectpicker" id="theme" title="Default">
                        <option value="dark" {{$mainTheme['themeName'] === "dark" ? 'selected' : ''}}>{{(trans('config.theme_dark'))}}</option>
                        <option value="dracula" {{$mainTheme['themeName'] === "dracula" ? 'selected' : ''}}>{{(trans('config.theme_dracula'))}}</option>
                        <option value="light" {{$mainTheme['themeName'] === "light" ? 'selected' : ''}}>{{(trans('config.theme_light'))}}</option>
                        <option value="grayscale" {{$mainTheme['themeName'] === "grayscale" ? 'selected' : ''}}>{{(trans('config.theme_grayscale'))}}</option>
                        <option value="halloween" {{$mainTheme['themeName'] === "halloween" ? 'selected' : ''}}>{{(trans('config.theme_halloween'))}}</option>
                        <option value="christmas" {{$mainTheme['themeName'] === "christmas" ? 'selected' : ''}}>{{(trans('config.theme_christmas'))}}</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{trans('config.force_theme')}}</label>
                    <input type="checkbox" id="forceTheme" {{$mainTheme['force'] === "true" ? 'checked' : ''}}>
                </div>
            </div>
        </div>
        <div class="col-md-10 text-right">
            <button type="submit" id="submit" class="btn btn-primary">{{trans('general.submit')}}</button>
        </div>
    </div>
</div>
<script type="text/javascript">

$(document).ready(function() {
    $('#submit').click(function() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/management/settings',
            method: 'POST',
            data: {
                'theme': $('#theme').val(),
                'forceTheme': $('#forceTheme').is(':checked'),
                'headline01': $('#headline01').val(),
                'headline02': $('#headline02').val(),
                'headlineHr': $('#headlineHr').is(':checked'),
                'headlineSocials': $('#headlineSocials').is(':checked')
            },
            beforeSend: function() {
                $('#submit').addClass('disabled');
                $('#submit').attr('disabled', '');
            },
            success: function() {
                toastr.success('Editing success', 'You\'re profile have been saved successfuly. Please wait while we reload the page.')
                $('#submit').removeClass('disabled');
                $('#submit').removeAttr('disabled', '');
                window.location.reload()
            },
            error: function (error) {
                toastr.error('An error occured', 'An error occured while trying to edit your profil try again later.')
                $('#submit').removeClass('disabled');
                $('#submit').removeAttr('disabled', '');
                console.log(error);
            }
        })
    });
});
</script>
@stop
