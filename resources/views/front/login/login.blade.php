@extends('app')

@section('header')
    <link href="{{ asset('css//custom/cover.css') }}" rel="stylesheet">
@stop

@section('no_container')
    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">
                <div class="inner cover">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h2>Inloggen</h2></div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="alert alert-info" role="alert">
                                    <p></p>
                                </div>

                                <div class="alert alert-danger" role="alert">
                                    <p></p>
                                </div>


                                <div class="form-group">
                                    <label for="inputEmail" class="sr-only">Email address</label>
                                    <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword" class="sr-only">Password</label>
                                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="remember-me"> <span class="stay">Blijf ingelogd</span>
                                    </label>
                                </div>

                                <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>

                                <div>
                                    <a class="stay" href="forgot">Wachtwoord vergeten?</a><br>
                                    <a class="stay" href="register">Registreren</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
