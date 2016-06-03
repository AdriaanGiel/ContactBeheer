@extends('includes/front/master_front')

@section('front_content')
    <div class="row">
        <div class="col-sm-5 col-md-3 sidebar front-sidebar">
            <div class="nav nav-sidebar">
                <div class="thumbnail">
                    <img src="{{asset('upload')}}/{{$contact->afbeelding}}" alt="..." class="img-circle">
                </div>
                <div>
                    {{$contact->voornaam}} {{$contact->achternaam}}
                    <hr>

                    @if($email)
                        {{$email->email}}
                    @else
                        <span>( geen email )</span><a style="float: right" href="{{route('contact.email.create',$contact->id)}}" class="btn btn-success btn-sm " role="button">
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    @endif
                    <hr>

                    @if($phone)
                        {{$phone->telefoonnummer}}
                    @else
                        <span>( geen telefoonnummer )</span><a style="float: right" href="{{route('contact.phonenumber.create',$contact->id)}}" class="btn btn-success btn-sm " role="button">
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    @endif
                    <hr>

                    @if($bank)
                        {{$bank->banknummer}}
                    @else
                        <span>( geen banknummer )</span><a style="float: right" href="{{route('contact.banknumber.create',$contact->id)}}" class="btn btn-success btn-sm " role="button">
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    @endif
                    <hr>
                    @if(!$contact->address->first())
                        <span>( geen address )</span><a style="float: right" href="{{route('contact.address.create',$contact->id)}}" class="btn btn-success btn-sm " role="button">
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                        <hr>
                    @endif

                </div>
            </div>
        </div>
    <div class="col-sm-7 col-md-9 contact-panel-div">
        <div class="panel panel-success contact-panel">
            <div class="panel-heading crumb-body">
                <ol class="breadcrumb crumbs">
                    <li><a href="{{route('contact.index')}}">Home</a></li>
                    <li class="active level_2">Info</li>
                </ol>

            </div>
            <div class="panel-body contact-panel-body list-group" id="contact-panel-body">
                <div id="dashboard">
                    @if(!$address && !$email && !$phone && !$bank)
                        <div class="col-md-12" style="text-align: center; font-size: 25px">
                            <span>( GEEN CONTACT-INFO )</span>
                        </div>
                    @endif

                    @if($address)
                    <a href="{{route('contact.address.index',$contact->id)}}" class="list-group-item contact-prop" data-check="4">
                        <div class="well well-lg contact-well">
                            Adres: {{ $address->straat }} {{$address->huisnummer}}{{$address->toevoeging}}, {{$address->postcode}} {{$address->plaats}}
                        </div>
                    </a>
                    @endif

                    @if($email)
                    <a href="{{route('contact.email.index',$contact->id)}}" class="list-group-item contact-prop" data-check="1">
                        <div class="well well-lg contact-well">
                            Email: {{ $email->email }}
                        </div>
                    </a>
                    @endif

                    @if($phone)
                    <a href="{{route('contact.phonenumber.index',$contact->id)}}" class="list-group-item contact-prop" data-check="2">
                        <div class="well well-lg contact-well">
                            Tel: {{$phone->telefoonnummer}}
                        </div>
                    </a>
                    @endif

                    @if($bank)
                    <a href="{{route('contact.banknumber.index',$contact->id)}}" class="list-group-item contact-prop" data-check="3">
                        <div class="well well-lg contact-well">
                            BankNr: {{$bank->banknummer}}
                        </div>
                    </a>
                    @endif
                </div>
                <div id="show_all" style='display: none'>

                </div>

                <div id="show" style='display: none'>

                </div>

                <div id="show_form" class="list-group" style='display: none'>
                    <div id="forms"></div>
                    <div id="add_button" class="col-md-12">
                        <a role="button" id="button_form_add" class=" btn btn-default btn-sm active">Nog een rij?</a>
                    </div>
                </div>

            </div>
        </div>
        @include('front.partial.panel_footer')
    </div>
    </div>

@stop