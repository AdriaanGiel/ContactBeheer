@extends('includes/front/master_front')


@section('front_content')
    @include('includes/front/sidebar_front')
        <div class="col-sm-7 col-md-9 contact-panel-div">
            <div class="panel panel-success contact-panel">
                <div class="panel-heading crumb-body">
                    <ol class="breadcrumb crumbs crumbs-buttons">
                        <li><a href="{{route('contact.index')}}">Home</a></li>
                        <li><a href="{{route('contact.index',$contact->id)}}">Info</a></li>
                        <li class="active">emails</li>
                    </ol>

                    @include('front.partial.add_buttons', ['url' => 'contact/'.$contact->id.'/email/create','target' => 'email'])
                </div>
                <div class="panel-body contact-panel-body list-group" id="contact-panel-body scroll-pane">
                    <div id="dashboard">
                        @foreach($emails as $email)
                            <div class="list-group-item">
                                <div class="well well-lg contact-well">
                                    <span class="content-text">{{ $email->email }}</span>
                                    <a role="button" class="delete-modal" data-type="1" data-toggle="modal" data-id="{{$email->id}}" data-target="#delete-modal"><span style="float:right" aria-hidden="true" class="glyphicon glyphicon-remove cross"></span></a>
                                    <a href="{{route('contact.email.edit',[$contact->id,$email->id])}}"><span style="float:right;margin-right: 10px" aria-hidden="true" class="glyphicon glyphicon-pencil pencil"></span></a>
                                </div>
                            </div>
                        @endforeach
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
                    @include('front/partial/delete_modal',['route' => 'contact.email.destroy','id' => 'fake'])
                </div>
            </div>
        </div>
    </div>
@stop