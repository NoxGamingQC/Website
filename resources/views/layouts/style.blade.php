<style>
    h1, h2, h3, h4, h5, h6, p, label, li {
        color: #{{$theme->background_text}};
    }

    .text-muted {
        color: #{{$theme->primary}};
    }

    a, a:link, a:visited {
        color: #{{$theme->background_text}} !important;
    }

    a:hover, a:active {
        color: #{{$theme->primary}} !important;
    }
    .btn-primary {
        background-color: #{{((strlen(dechex(hexdec(substr($theme->background, 0, 2)) * 0.75)) == 1) ? ('0' . dechex(hexdec(substr($theme->background, 0, 2)) * 0.75)) : (dechex(hexdec(substr($theme->background, 0, 2)) * 0.75))) . ((strlen(dechex(hexdec(substr($theme->background, 2, 2)) * 0.75)) == 1) ? ('0' . dechex(hexdec(substr($theme->background, 2, 2)) * 0.75)) : (dechex(hexdec(substr($theme->background, 2, 2)) * 0.75))) .  ((strlen(dechex(hexdec(substr($theme->background, 4, 2)) * 0.75)) == 1) ? ('0' . dechex(hexdec(substr($theme->background, 4, 2)) * 0.75)) : (dechex(hexdec(substr($theme->background, 4, 2)) * 0.75)))}};
        color: #{{$theme->primary_text}};
        border-color: #{{((strlen(dechex(hexdec(substr($theme->background, 0, 2)) * 0.75)) == 1) ? ('0' . dechex(hexdec(substr($theme->background, 0, 2)) * 0.75)) : (dechex(hexdec(substr($theme->background, 0, 2)) * 0.75))) . ((strlen(dechex(hexdec(substr($theme->background, 2, 2)) * 0.75)) == 1) ? ('0' . dechex(hexdec(substr($theme->background, 2, 2)) * 0.75)) : (dechex(hexdec(substr($theme->background, 2, 2)) * 0.75))) .  ((strlen(dechex(hexdec(substr($theme->background, 4, 2)) * 0.75)) == 1) ? ('0' . dechex(hexdec(substr($theme->background, 4, 2)) * 0.75)) : (dechex(hexdec(substr($theme->background, 4, 2)) * 0.75)))}} !important;
        padding: 15px;
        border-radius: 15px;
    }
    .btn-primary:hover, .btn-primary:active {
        background-color: #{{$theme->background}};
        border-color: #{{ $theme->primary }} !important;
        color: #{{$theme->primary_text}};
        box-shadow: 0 0 .1rem #{{((strlen(dechex(hexdec(substr($theme->primary, 0, 2)) * 1.5)) == 1) ? ('0' . dechex(hexdec(substr($theme->primary, 0, 2)) * 1.5)) : (dechex(hexdec(substr($theme->primary, 0, 2)) * 1.5))) . ((strlen(dechex(hexdec(substr($theme->primary, 2, 2)) * 1.5)) == 1) ? ('0' . dechex(hexdec(substr($theme->primary, 2, 2)) * 1.5)) : (dechex(hexdec(substr($theme->primary, 2, 2)) * 1.5))) .  ((strlen(dechex(hexdec(substr($theme->primary, 4, 2)) * 1.5)) == 1) ? ('0' . dechex(hexdec(substr($theme->primary, 4, 2)) * 1.5)) : (dechex(hexdec(substr($theme->primary, 4, 2)) * 1.5)))}},
            0 0 .1rem #{{((strlen(dechex(hexdec(substr($theme->primary, 0, 2)) * 1.5)) == 1) ? ('0' . dechex(hexdec(substr($theme->primary, 0, 2)) * 1.5)) : (dechex(hexdec(substr($theme->primary, 0, 2)) * 1.5))) . ((strlen(dechex(hexdec(substr($theme->primary, 2, 2)) * 1.5)) == 1) ? ('0' . dechex(hexdec(substr($theme->primary, 2, 2)) * 1.5)) : (dechex(hexdec(substr($theme->primary, 2, 2)) * 1.5))) .  ((strlen(dechex(hexdec(substr($theme->primary, 4, 2)) * 1.5)) == 1) ? ('0' . dechex(hexdec(substr($theme->primary, 4, 2)) * 1.5)) : (dechex(hexdec(substr($theme->primary, 4, 2)) * 1.5)))}},
            0 0 1rem #{{ $theme->primary }},
            0 0 0.1rem #{{ $theme->primary }},
            inset 0 0 1.1rem #{{ $theme->primary }}; 
    }
    .panel-primary {
        background-color: #{{$theme->background}};
        color: #{{$theme->background_text}};
        border: 1px solid #{{$theme->primary}};
        border-color: #{{$theme->primary}} !important;
        border-radius: 25px;
    }

    .panel-primary > .panel-body {
        background-color: #{{$theme->background}};
        color: #{{$theme->background_text}};
        border: 1px solid #{{$theme->primary}};
        border-color: #{{$theme->primary}} !important;
        border-radius: 25px;
    }

    .social-bar-item {
        padding: 12px 11px !important;
    }
</style>