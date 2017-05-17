<!DOCTYPE html>
<!-- saved from url=(0034)https://my.farmbot.io/app/designer -->
<html>
<title>@yield('pagename')</title>
<head>
    @yield('meta')
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" href="{{asset('ss.png')}}">

    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="{{url('css2/bootstrap.min.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <script  type="text/javascript" src="{{url('jquery-3.2.0.min.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="{{url('styles.css')}}">
    @yield('addstylesheet')
    <script type="text/javascript" charset="utf-8" async="" src=""></script>
    <script type="text/javascript" charset="utf-8" async="" src=""></script>
</head>

<body class="@yield('bodyclass')">

<div class="toast-container"></div>
<div id="root">
    <div  data-reactroot class="app">
        <nav   role="navigation">
            <button><i  id="sandwich" class="fa fa-bars"></i></button><span class="page-name">@yield('pagename')</span>
            <div id="ka" class="links ">
                <ul>
                    <li><a href="{{url('/map')}}" class="@yield('map')" ><i class="fa fa-leaf"></i><!-- react-text: 12 -->Farm Designer<!-- /react-text --></a></li>
                    <li><a href="{{url('/control')}}" class="@yield('control')" ><i class="fa fa-keyboard-o"></i><!-- react-text: 16 -->Controls<!-- /react-text --></a></li>
                    <li><a href="{{url('/state')}}" class="@yield('state')" ><i class="fa fa-calendar-check-o"></i><!-- react-text: 28 -->Plant State<!-- /react-text --></a></li>
                    <li><a href="{{url('/weather')}}" class="@yield('weather')"><i class="fa fa-wrench"></i><!-- react-text: 32 -->Weather<!-- /react-text --></a></li>
                    <li><a href="{{url('SeedsPlace')}}" class="@yield('Seeds')"><i class="fa fa-wrench"></i><!-- react-text: 32 -->Seeds<!-- /react-text --></a></li>

                </ul>
                <ul class="mobile-menu-extras">
                    <li><a href=""><i class="fa fa-cog"></i><!-- react-text: 37 -->Account Settings<!-- /react-text --></a></li>
                    <li><a><i class="fa fa-sign-out"></i><!-- react-text: 41 -->Logout<!-- /react-text --></a></li>
                </ul>
                <div class="version-links mobile-only"></div>
            </div>
            <button  id="sync" class="nav-sync button-like green">Synced</button>
        @yield('stop')    {{--<button class="red widget-control button-like
                    red" type="button">E-STOP</button>--}}
            <div class="ticker-list"></div>

            <div class="nav-dropdown"><span>{{ Auth::user()->name }} ▾</span>
                <div class="nav-dropdown-content">
                    <ul>
                        <li><a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i><!-- react-text: 63 -->Logout<!-- /react-text --></a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            </form>

                        </li>
                    </ul>
                    <div class="version-links"><span>About us:<a href="" target="_blank">link</a></span><span><!-- react-text: 69 -->Contact:<!-- /react-text --><a href="" target="_blank">link</a></span></div>
                </div>
            </div>
        </nav>
        <div class="underlay expanded"></div>
        @yield('content')
    </div>
</div>

<script>

    window.onload=function() {
        var sandwich = document.getElementById("sandwich");
        var ka = document.getElementById("ka");
        var a=true;
        sandwich.onclick = function() {
            if (a)
            {
                ka.className="links";
                a=false;
            }else
            { ka.className="links expanded"; a=true;}
        };
    }




</script>
@yield('addscript')

</body>

</html>