<div class="row footer" style="background: linear-gradient(#{{$theme->background}}ef, #{{$theme->primary}}ef), url('/img/NoxGamingQC.png'), linear-gradient(#{{$theme->background}}, #{{$theme->background}});background-position: 50% 65%;background-repeat: no-repeat;background-size: cover;">
    <div class="col-md-12 text-center">
        <p>
            @include('layouts.socials')
        </p>
        <br />
        <h5 class="raleway-font">{{trans('general.copyright_noxgamingqc')}}</h5>
        <br />
        <p><small>commit: {{$sourceVersion}}<small></p>
    </div>
</div>
