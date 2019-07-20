<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NoxRacing - NoxBOT</title>
        <link rel="icon" href="/img/Avatar.png" type="image/png">
        <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
    </head>
    <body>
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        @guest
            <input type="hidden" id="isUserLogged" value="false">
            <input type="hidden" id="loginRoute" value="{{ route('login') }}">
            <input type="hidden" id="registerRoute" value="{{ route('register') }}">
        @else
            <input type="hidden" id="isUserLogged" value="true">
            <input type="hidden" id="discordUserID" value="{{Auth::user()->DiscordID}}">
            <input type="hidden" id="username" value="{{ Auth::user()->name }}">
            <input type="hidden" id="logoutRoute" value="{{ route('logout') }}">
        @endguest
        <div id="root"></div>
        <script src="{{mix('js/app.js')}}" ></script>
    </body>
</html>
