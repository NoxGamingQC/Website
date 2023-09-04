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
    .btn-success {
        background-color: #{{((strlen(dechex(hexdec(substr($theme->background, 0, 2)) * 0.75)) == 1) ? ('0' . dechex(hexdec(substr($theme->background, 0, 2)) * 0.75)) : (dechex(hexdec(substr($theme->background, 0, 2)) * 0.75))) . ((strlen(dechex(hexdec(substr($theme->background, 2, 2)) * 0.75)) == 1) ? ('0' . dechex(hexdec(substr($theme->background, 2, 2)) * 0.75)) : (dechex(hexdec(substr($theme->background, 2, 2)) * 0.75))) .  ((strlen(dechex(hexdec(substr($theme->background, 4, 2)) * 0.75)) == 1) ? ('0' . dechex(hexdec(substr($theme->background, 4, 2)) * 0.75)) : (dechex(hexdec(substr($theme->background, 4, 2)) * 0.75)))}};
        color: #{{$theme->background_text}};
        border-color: #{{((strlen(dechex(hexdec(substr($theme->background, 0, 2)) * 0.75)) == 1) ? ('0' . dechex(hexdec(substr($theme->background, 0, 2)) * 0.75)) : (dechex(hexdec(substr($theme->background, 0, 2)) * 0.75))) . ((strlen(dechex(hexdec(substr($theme->background, 2, 2)) * 0.75)) == 1) ? ('0' . dechex(hexdec(substr($theme->background, 2, 2)) * 0.75)) : (dechex(hexdec(substr($theme->background, 2, 2)) * 0.75))) .  ((strlen(dechex(hexdec(substr($theme->background, 4, 2)) * 0.75)) == 1) ? ('0' . dechex(hexdec(substr($theme->background, 4, 2)) * 0.75)) : (dechex(hexdec(substr($theme->background, 4, 2)) * 0.75)))}} !important;
        padding: 15px;
        border-radius: 15px;
       
    }
    .btn-success:hover, .btn-success:active {
        background-color: #{{$theme->background}};
        border-color: #{{ $theme->green }} !important;
        color: #{{$theme->background_text}};
        box-shadow: 0 0 .1rem #{{$theme->green}},
            0 0 .1rem #{{$theme->green}},
            0 0 1rem #{{ $theme->green }},
            0 0 0.1rem #{{ $theme->green }},
            inset 0 0 1.1rem #{{ $theme->green }}; 
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

    .navbar-default {
        border-color: #{{$theme->background}};
    }
    .text-primary {
        color: #{{$theme->primary}} !important;
    }
    .text-info {
        color: #{{$theme->blue}} !important;
    }
    .text-warning {
        color: #{{$theme->yellow}} !important;
    }
    .text-danger {
        color: #{{$theme->red}} !important;
    }
    .text-success {
        color: #{{$theme->green}} !important;
    }

    .navbar-default {
        background: linear-gradient(#{{((strlen(dechex(hexdec(substr($theme->primary, 0, 2)) * 0.50)) == 1) ? ('0' . dechex(hexdec(substr($theme->primary, 0, 2)) * 0.50)) : (dechex(hexdec(substr($theme->primary, 0, 2)) * 0.50))) . ((strlen(dechex(hexdec(substr($theme->primary, 2, 2)) * 0.50)) == 1) ? ('0' . dechex(hexdec(substr($theme->primary, 2, 2)) * 0.50)) : (dechex(hexdec(substr($theme->primary, 2, 2)) * 0.50))) .  ((strlen(dechex(hexdec(substr($theme->primary, 4, 2)) * 0.50)) == 1) ? ('0' . dechex(hexdec(substr($theme->primary, 4, 2)) * 0.50)) : (dechex(hexdec(substr($theme->primary, 4, 2)) * 0.50)))}}ef, #{{$theme->background}}ef), url('/img/NoxGamingQC.png'), linear-gradient(#{{$theme->background}}, #{{$theme->background}});
        background-position: 50% 35%;
        background-repeat: no-repeat;
        background-size: cover;
        .navbar-nav {
            > .current-page {
            background-color: #{{$theme->primary}};
            }
        }
    }

    .footer {
        background: linear-gradient(#{{$theme->background}}ef, #{{((strlen(dechex(hexdec(substr($theme->primary, 0, 2)) * 0.50)) == 1) ? ('0' . dechex(hexdec(substr($theme->primary, 0, 2)) * 0.50)) : (dechex(hexdec(substr($theme->primary, 0, 2)) * 0.50))) . ((strlen(dechex(hexdec(substr($theme->primary, 2, 2)) * 0.50)) == 1) ? ('0' . dechex(hexdec(substr($theme->primary, 2, 2)) * 0.50)) : (dechex(hexdec(substr($theme->primary, 2, 2)) * 0.50))) .  ((strlen(dechex(hexdec(substr($theme->primary, 4, 2)) * 0.50)) == 1) ? ('0' . dechex(hexdec(substr($theme->primary, 4, 2)) * 0.50)) : (dechex(hexdec(substr($theme->primary, 4, 2)) * 0.50)))}}ef), url('/img/NoxGamingQC.png'), linear-gradient(#{{$theme->background}}, #{{$theme->background}});
        background-position: 50% 65%;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>