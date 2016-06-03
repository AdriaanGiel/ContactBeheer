@extends('app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/custom/cover.css') }}" type="text/css">
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 25%">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<div class="site-wrapper">--}}

    {{--<div class="site-wrapper-inner">--}}

        {{--<div class="cover-container">--}}

            {{--<div class="inner cover">--}}
                {{--<div class="panel panel-primary">--}}
                    {{--<div class="panel-heading"><h2>Inloggen</h2></div>--}}
                    {{--<div class="panel-body">--}}
                        {{--<div class="col-md-12">--}}


                            {{--<div class="form-group">--}}
                                {{--<label for="inputEmail" class="sr-only">Email address</label>--}}
                                {{--<input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label for="inputPassword" class="sr-only">Password</label>--}}
                                {{--<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>--}}
                            {{--</div>--}}

                            {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                    {{--<input type="checkbox" value="remember-me"> <span class="stay">Blijf ingelogd</span>--}}
                                {{--</label>--}}
                            {{--</div>--}}

                            {{--<button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>--}}

                            {{--<div>--}}
                       {{----}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}


        {{--</div>--}}

    {{--</div>--}}

{{--</div>--}}
@endsection
