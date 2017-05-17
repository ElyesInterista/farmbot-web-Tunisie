
<!DOCTYPE html>
<!-- saved from url=(0022)https://my.Cowbot.io/ -->
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Cowbot</title>
    <link rel="stylesheet" href="{{url('css2/bootstrap.min.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('styles.css')}}">
    <link rel="icon" href="{{asset('ss.png')}}">


<body>
<div id="root">
    <div data-reactroot="" class="static-page">
        <h1>Welcome to the Cowbot Web App</h1>
        <h2 class="fb-desktop-show">Setup, customize, and control Cowbot from your computer</h2>
        <h2 class="fb-tablet-show">Setup, customize, and control Cowbot from your tablet</h2>
        <h2 class="fb-mobile-show">Setup, customize, and control Cowbot from your smartphone</h2>
        <div class="image-login-wrapper">
            <div class="image-wrapper"><img class="fb-desktop-show" src="{{asset('farmbot-desktop.png')}}"><img class="fb-tablet-show" src="{{asset('farmbot-tablet.png')}}"></div>
            <div class="all-content-wrapper login-wrapper">

                <div class="row">
                    <div class="widget-wrapper">
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="widget-header">
                                    @section('divlogin')

                                    <h5>Login</h5><i class="fa fa-plus"></i></div>
                            </div>
                        </div>
                        <div class="row">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}
                                <div class="col-sm-12">
                                    <div class="widget-content">
                                        <div class="input-group">
                                            <label>
                                                <!-- react-text: 24 -->
                                                <!-- /react-text -->
                                                <!-- react-text: 25 -->Email
                                                <!-- /react-text -->
                                                <!-- react-text: 26 -->
                                                <!-- /react-text -->
                                            </label>
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>

                                            <label>Password</label>


                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif


                                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                            Forgot password?</a>

                                    </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <button  type="submit"  class="button-like button green login">Login</button>
                                            </div>
                                         @show
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="toast-container"></div>
</body>

</html>




























