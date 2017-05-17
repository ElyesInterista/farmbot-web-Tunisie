@extends('auth.login')
@section('divlogin')

    <h5>FORGOT PASSWORD</h5><a href="{{url('login')}}"><button class="gray button-like" type="button">BACK</button></a></i></div>
    </div>
    </div>
    <div class="row">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-sm-12">
                <div class="widget-content">
                    <div class="input-group">
                        <label>
                            <!-- react-text: 24 -->
                            <!-- /react-text -->
                            <!-- react-text: 25 --> Enter Email
                            <!-- /react-text -->
                            <!-- react-text: 26 -->
                            <!-- /react-text -->
                        </label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button  type="submit"  class="button-like button green login">SEND PASSWORD RESET</button>
                    </div>@endsection





























@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
