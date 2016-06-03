<div class="row">
    <div class="col-sm-5 col-md-3 sidebar front-sidebar">
        <div class="nav nav-sidebar">
            <div class="thumbnail hidden-xs">
                <img src="{{asset('upload')}}/{{$contact->afbeelding}}" alt="..." class="img-circle">
            </div>
            <div class="hidden-xs">
                {{$contact->voornaam}} {{$contact->achternaam}}
                <hr>
                @if($contact->email->first())
                    {{$contact->email->first()->email}}
                @else
                    <span>( geen email )</span><a style="float: right" href="{{url("contact/$contact->id/email/create")}}" class="btn btn-success btn-sm " role="button">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                @endif
                <hr>

                @if($contact->phone->first())
                    {{$contact->phone->first()->telefoonnummer}}
                @else
                    <span>( geen telefoonnummer )</span><a style="float: right" href="{{url("contact/$contact->id/phonenumber/create")}}" class="btn btn-success btn-sm " role="button">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                @endif
                <hr>

                @if($contact->bank->first())
                    {{$contact->bank->first()->banknummer}}
                @else
                    <span>( geen banknummer )</span><a style="float: right" href="{{url("contact/$contact->id/banknumber/create")}}" class="btn btn-success btn-sm " role="button">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                @endif
                <hr>

                @if(!$contact->address->first())
                    <span>( geen address )</span><a style="float: right" href="{{url("contact/$contact->id/address/create")}}" class="btn btn-success btn-sm " role="button">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                    <hr>
                @endif

            </div>
            @include('includes/messages/error_message')
            @include('includes/messages/info_message')
            @include('includes/messages/success_message')
            @include('includes/messages/warning_message')
            @include('includes/messages/validation_error_message')
        </div>
    </div>