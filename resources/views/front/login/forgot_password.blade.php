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
                        <div class="panel-heading"><h2>Wachtwoord vergeten</h2></div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form class="form-signin">
                                    <div class="alert alert-info" role="alert">
                                        <p>Er wordt een link verstuurd naar uw email waarmee u opnieuw uw gebruikersnaam en wachtwoord kunt instellen.</p>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail" class="sr-only">Email address</label>
                                        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                                    </div>

                                    <button class="btn btn-lg btn-primary btn-block" type="submit">Verstuur</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop