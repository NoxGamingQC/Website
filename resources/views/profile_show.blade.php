<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NoxGamingQC - Profile</title>
    <link rel="icon" href="/img/Avatar.png" type="image/png">
    <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
</head>

<body>
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <!-- NAVBAR -->
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
                    <li class="nav-home"><a href="/home"><i class="fa fa-home" aria-hidden="true"></i> Welcome <span class="sr-only">current</span></a></li>
                    <li class="nav-stream"><a href="/stream"><i class="fa fa-video-camera" aria-hidden="true"></i> Stream</a></li>
                    <li class="nav-partnership"><a href="/partnership"><i class="fa fa-handshake-o" aria-hidden="true"></i> Affiliates|Partners</a></li>
                    <li class="nav-positivity_stream_team"><a href="/positivity_stream_team"><i class="fa fa-heart" aria-hidden="true"></i> Positivity Stream Team</a></li>
                    <li class="nav-noxbot"><a href="/noxbot"><i class="fa fa-user" aria-hidden="true"></i> NoxBOT</a></li>
                    <li class="nav-contact"><a href="/contact"><i class="fa fa-address-book " aria-hidden="true"></i> Contact me</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                </ul>
            </div>
        </div>
    </nav>

    <!-- ///////////////////////////////////////////////////////////// -->
    <!-- BODY -->

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="text-center">
                    <img class="img-circle" src="{{$avatarURL}}" alt="{{$discordName}}" width="120px" style="padding: 7px 14px" />
                    <h1>{{$username}} <small>{{$firstname}} {{$lastname}}</small></h1>
                    <h3>{{$grade}}</h3>
                    @foreach ($discordBadges as $badge)
                    <img src="/img/discord/{{$badge}}.png" alt="{{$badge}}" width="75px" style="padding: 7px 14px" />
                    @endforeach
                    <hr />
                </div>
                <div class="col-md-6">
                    <h4>User aknowledgement</h4>
                    <hr />
                    <ul>
                        <li><b>Account Level:</b> {{$grade}}</li>
                        <li><b>Premium User:</b> {{$isPremium}}</li>
                        @if($gender)<li><b>Gender:</b> {{$gender}}</li>@endif
                        @if($birthdate)<li><b>Birthdate:</b> {{$birthdate}}</li>@endif
                        @if($age)<li><b>Age:</b> {{$age}}</li>@endif
                    </ul>
                </div>
                <div class="col-md-6">
                    <h4>Discord user aknowledgement</h4>
                    <hr />
                    <ul>
                        <li><b>ID:</b> {{$discordID}}</li>
                        <li><b>Username:</b> {{$discordName . '#' . $discriminator}}</li>
                        <li><b>Language:</b> {{$language}}</li>
                        <li><b>Nitro Subscription:</b> {{$nitroSubscription}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- ///////////////////////////////////////////////////////////// -->
    <!-- FOOTER -->
    <div class="row">
        <div class="col-md-12 text-center">
            <hr />
            <p>© Copyright Nox's Studios. All right reserved.</p>
        </div>
    </div>
    <!-- ///////////////////////////////////////////////////////////// -->
    <script src="{{mix('js/app.js')}}"></script>
</body>

</html>
