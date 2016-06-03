@extends('app')

@section('content')
    <h1>{{ $contact->voornaam }}</h1>
    <ul>
        <li>{{ $contact->achternaam }}</li>
    </ul>

    @foreach($contact->address as $addres):
        <p>{{$addres->straat}}</p>
    @endforeach
@stop