@extends('includes/front/master_front')

@section('front_content')
    <div class="row">
        <div class="col-sm-5 col-md-3 sidebar front-sidebar">
            <div class="nav nav-sidebar">
                <div class="thumbnail">
                    @if(count($contacts)>0)
                        @if($contacts[0]->afbeelding)
                            <a id="image_link" href="{{route("contact.show",$contacts[0]->id)}}"><img id="first_image" src="{{asset('upload')}}/{{$contacts[0]->afbeelding}}" alt="..." class="img-circle"></a>
                        @endif
                    @else
                        <img src="{{asset('upload/profile_pic/default.jpg')}}" alt="..." class="img-circle">
                    @endif
                </div>

                @if(count($contacts)>0)
                <div>
                    <span class="vname">
                        @if($contacts[0]->voornaam)
                            {{$contacts[0]->voornaam}} {{$contacts[0]->achternaam}}
                        @endif
                    </span>
                    <hr>
                    <span class="birth">
                        @if($contacts[0]->geboortedatum)
                            {{$contacts[0]->geboortedatum}}
                        @endif
                    </span>
                    <hr>
                    <span class="comment_op">
                        @if($contacts[0]->remark->opmerking)
                            <p>{{$contacts[0]->remark->opmerking}}</p>
                        @endif
                    </span>
                    <hr>
                </div>
                @else
                    <div style="margin-top: 150px;font-size: 15px">( NOG GEEN CONTACTEN)</div>
                @endif

                @include('includes/messages/error_message')
                @include('includes/messages/info_message')
                @include('includes/messages/success_message')
                @include('includes/messages/warning_message')
                @include('includes/messages/validation_error_message')
            </div>
        </div>

    <div class="col-sm-7 col-md-9 contact-panel-div">
        <div class="panel panel-info contact-panel">
            <div class="panel-heading crumb-body">
                    <ol class="breadcrumb crumbs crumbs-buttons">
                        <li class="active">Home</li>
                    </ol>
                @include('front.partial.add_buttons', ['url' => 'contact/create','target' => 'contact'])
            </div>
            <div class="panel-body contact-panel-body list-group scroll-pane">
                @if(count($contacts)>0)
                    @foreach($contacts as $contact)
                    <a href="{{route('contact.show', $contact->id)}}" class="list-group-item">
                        <div class="media">
                            <div class="media-left contact-image-div">
                                <img class="media-object small-image img-circle img-responsive" src="{{asset('upload')}}/{{$contact->afbeelding}}" alt="...">
                            </div>

                            <div class="media-body">
                                <h4 class="media-heading">{{ $contact->voornaam }} {{ $contact->achternaam }}</h4>
                                <p>{{ $contact->remark->opmerking }}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                @else
                    <div class="col-md-12" style="text-align: center; font-size: 25px">
                        <span>( NOG GEEN CONTACTEN )</span>
                    </div>
                @endif
            </div>

        </div>
        <div style="border: solid 1px black;border-top: none" class="panel-footer col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-6 col-sm-4 col-xs-4">
                <a href="#" class="btn btn-info btn-sm" role="button">Profiel bewerken</a>
            </div>
            <div class="col-md-6 col-sm-8 col-xs-8" style="text-align: right">
                <span class="visible-md-inline visible-lg-inline">Filter: </span>
                {!! Form::select('relation_id', $relation_array, null, ['class' => 'form-control input-sm', 'style' => 'width: 200px;display:inline', 'id' => 'filter']) !!}
            </div>
        </div>
    </div>

    </div>
@stop