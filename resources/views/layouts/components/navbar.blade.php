<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top p-0">
  <div class="container-fluid py-0">
     <a class="navbar-brand" href="/">
        <img src="/img/logo.svg" alt="NoxGamingQC" width="50" height="50">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/"><i class="fa fa-home" aria-hidden="true"></i> {{trans('navigation.welcome')}}</a>
            </li>
            <li class="nav-item dropdown disabled" aria-disabled="true">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> {{trans('navigation.about_us')}}</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/{{app()->getLocale()}}/about_us/contact_us"><i class="fa fa-address-card-o" aria-hidden="true"></i> {{trans('navigation.contact_us')}}</a></li>
                    <li><a class="dropdown-item disabled" href="#" aria-disabled="true">{{trans('navigation.game_list')}}</a></li>
                    <li><a class="dropdown-item disabled" href="#" aria-disabled="true">{{trans('navigation.partners')}}</a></li>
                    <li><a class="dropdown-item disabled" href="#" aria-disabled="true">{{trans('navigation.projects')}}</a></li>
                    <li><a class="dropdown-item disabled" href="#" aria-disabled="true">{{trans('navigation.teams')}}</a></li>
                    <li><a class="dropdown-item disabled" href="#" aria-disabled="true">{{trans('navigation.twitch')}}</a></li>
                    <li><a class="dropdown-item disabled" href="#" aria-disabled="true">{{trans('navigation.youtube')}}</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" aria-disabled="true"><i class="fa fa-shopping-cart" aria-hidden="true"></i> {{trans('navigation.store')}}</a>
            </li>
        </ul>
    </div>
  </div>
</nav>