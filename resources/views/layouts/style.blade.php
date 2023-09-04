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
        background-color: #{{$theme->primary}};
        color: #{{$theme->primary_text}}
    }
    .btn-primary:hover, .btn-primary:active {
        background-color: #{{$theme->primary}};
        color: #{{$theme->primary_text}};
        filter: brightness(0.85);
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
</style>