@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="jumbotron top-head">
            <h1>Contact Toevoegen</h1>
        </div>
        <div class="col-sm-12 col-md-12 contact-panel-div-create">
            <div class="panel panel-success contact-panel create-panel-body">
                <div class="panel-heading">
                </div>
                <div class="panel-body col-md-12 well">

                    {!! Form::open(['route'=> 'contact.store']) !!}
                    <h3 class="col-md-12">Contact Gegevens:</h3>
                    @include('front.partial.contact_form',$relations)

                    @include('front.partial.email_form')

                    @include('front.partial.phone_form')

                    @include('front.partial.bank_form')

                    @include('front.partial.address_form')

                    @include('includes.messages.validation_error_message')

                    {!! Form::hidden('all_data','true') !!}

                    <div class="form-group col-md-12">
                        {!! Form::submit('Contact Toevoegen',['class' => 'btn btn-success form-control']) !!}
                    </div>
                    {!! Form::close() !!}


        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-number="">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><span class="custom-modal-title">Toevoegen</span></h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info" role="alert">
                            Voer hier in hoeveel <span class="transfer-name"></span> u wilt toevoegen.
                        </div>

                        <div class="form-group form-inline modal-form">
                            <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                            <div class="input-group">
                                <div class="input-group-addon">#</div>
                                <input type="text" class="form-control" id="aantal-loops" placeholder="Aantal">
                            </div>
                        </div>

                        <div class="modal-content-new">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    </div>
    </div>

@stop