<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/home" style="display: flex; alignItems: center">
                NoxGamingQC
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="nav-home"><a href="/{{app()->getLocale()}}/home"><i class="fa fa-home" aria-hidden="true"></i> Welcome <span class="sr-only">current</span></a></li>
                <li class="nav-stream"><a href="/{{app()->getLocale()}}/stream"><i class="fa fa-video-camera" aria-hidden="true"></i> Stream</a></li>
                <li class="nav-projects"><a href="/{{app()->getLocale()}}/projects"><i class="fa fa-heart" aria-hidden="true"></i> Projects</a></li>
                <li class="nav-noxbot"><a href="/{{app()->getLocale()}}/noxbot"><i class="fa fa-user" aria-hidden="true"></i> NoxBOT</a></li>
                <li class="nav-contact"><a href="/{{app()->getLocale()}}/contact"><i class="fa fa-address-book " aria-hidden="true"></i> Contact me</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

            </ul>
        </div>
    </div>
</nav>
