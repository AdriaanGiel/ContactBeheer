@extends('includes/front/master_front')

@section('front_content')
    @include('includes/front/sidebar_front')
    @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
    {!! Form::open(['route'=> ['contact.phonenumber.store',$contact->id]]) !!}
    <div class="col-sm-7 col-md-9 contact-panel-div">
        <div class="panel panel-warning contact-panel">
            <div class="panel-heading crumb-body">
                <ol class="breadcrumb crumbs crumbs-buttons">
                    <li><a href="{{route('contact.index')}}">Home</a></li>
                    <li class=""><a href="{{route('contact.show',$contact->id)}}">Info</a></li>
                    <li class=""><a href="{{route('contact.phonenumber.index',$contact->id)}}">Telefoonnummers</a></li>
                    <li class="active">Telefoonnummer toevoegen</li>
                </ol>


                <div class="add-buttons">
                    <button class="btn btn-success btn-sm" type="submit">Opslaan</button>
                </div>
            </div>

            <div class="panel-body contact-panel-body list-group" style="padding: 15px !important;" id="contact-panel-body">
                <div class="list-group">
                    <div class="well col-md-12  list-group-item">
                        @include('front/partial/phone_form')
                        <input type="hidden" value="{{$contact->id}}" name="contact_id">
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@stop