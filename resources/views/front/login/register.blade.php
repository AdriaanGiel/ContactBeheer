@extends('app')

@section('header')
    <link href="{{ asset('css//custom/cover.css') }}" rel="stylesheet">
@stop

@section('no_container')
    <body>
    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">
                <div class="inner cover">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h2>Registreren</h2></div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <h2 class="form-signin-heading"></h2>

                                <div class="form-group">
                                    <label for="username" class="sr-only">Gebruikersnaam</label>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Gebruikersnaam" required>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="sr-only">Email address</label>
                                    <input type="email" id="email"  name="email" class="form-control" placeholder="Email address" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="voornaam" class="sr-only">Voornaam</label>
                                    <input type="text" id="voornaam"  name="voornaam" class="form-control" placeholder="Voornaam">
                                </div>

                                <div class="form-group">
                                    <label for="achternaam" class="sr-only">Achternaam</label>
                                    <input type="text" id="achternaam"  class="form-control" name="achternaam" placeholder="Achternaam">
                                </div>

                                <div class="form-group">
                                    <label for="Password" class="sr-only">Wachtwoord</label>
                                    <input type="password" id="Password" class="form-control" name="password" placeholder="Wachtwoord" required>
                                </div>

                                <div class="form-group">
                                    <label for="Password_confirm" class="sr-only">Password</label>
                                    <input type="password" id="Password_confirm" class="form-control" name="password_confirm" placeholder="Wachtwoord bevestigen" required>
                                </div>

                                <button class="btn btn-lg btn-primary btn-block" type="submit">Registreren</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop