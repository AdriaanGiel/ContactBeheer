@extends('includes/front/master_front')

@section('front_content')
    @include('includes/front/sidebar_front')
        <div class="col-sm-7 col-md-9 contact-panel-div">
            <div class="panel panel-success contact-panel">
                <div class="panel-heading crumb-body">
                    <ol class="breadcrumb crumbs crumbs-buttons">
                        <li><a href="{{route('contact.index')}}">Home</a></li>
                        <li class=""><a href="{{route('contact.show',$contact->id)}}">Info</a></li>
                        <li class="active">Adressen</li>
                    </ol>
                    @include('front.partial.add_buttons', ['url' => 'contact/'.$contact->id.'/address/create','target' => 'address'])
                </div>
                <div class="panel-body contact-panel-body list-group" id="contact-panel-body scroll-pane">
                    <div id="dashboard">
                        @if($addresses)
                            @foreach($addresses as $address)
                                <div class="list-group-item">
                                    <div class="well well-lg contact-well">
                                        <span class="content-text">{{ $address->straat }} {{$address->huisnummer}}{{$address->toevoeging}}, {{$address->postcode}} {{$address->plaats}}</span>
                                        <a role="button" class="delete-modal" data-type="4" data-toggle="modal" data-id="{{$address->id}}" data-target="#delete-modal"><span style="float:right" aria-hidden="true" class="glyphicon glyphicon-remove cross"></span></a>
                                        <a href="{{route('contact.address.edit',[$contact->id,$address->id])}}"><span style="float:right;margin-right: 10px" aria-hidden="true" class="glyphicon glyphicon-pencil pencil"></span></a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12" style="text-align: center; font-size: 25px">
                                <span>( NOG GEEN ADDRESSEN )</span>
                            </div>
                        @endif
                    </div>

                    @include('front/partial/delete_modal',['route' => 'contact.address.destroy','id' => 'fake'])
                </div>
            </div>
        </div>
    </div>
@stop