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
                <a class="nav-link active" aria-current="page" href="/"> {{trans('navigation.welcome')}}</a>
            </li>
            <li class="nav-item dropdown disabled" aria-disabled="true">
                <a class="nav-link dropdown-toggle disabled" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" aria-disabled="true">{{trans('navigation.about_us')}}</a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" aria-disabled="true">{{trans('navigation.store')}}</a>
            </li>
        </ul>
    </div>
  </div>
</nav>