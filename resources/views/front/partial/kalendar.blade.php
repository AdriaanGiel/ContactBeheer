<div class="row kalender-holder">
    <div class="col-md-12 kalender-top">
        @foreach($kalendar as $key=> $kal)
            <div class="kalender-wrapper">
                <a href="" class="months">
                    <div class="panel panel-default col-md-1 kalender">
                        <div class="panel-heading months-panel">{{$key}}</div>
                    </div>
                </a>
                <div class="pop-up">
                    <div class="row">
                        <div class="col-md-12 pop-up-close-body">
                            <a href="" class="pop-up-close">
                                <span style="float: right;padding-right: 5px;padding-top: 5px" class="glyphicon glyphicon-remove"></span>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @if(count($kal))
                                <ul class="list-group">
                                    @foreach($kal as $k)
                                        <li class="list-group-item birth">{{$k->message}}</li>
                                    @endforeach
                                </ul>
                            @else
                                 <p>ER IS IN DEZE MAAND NIEMAND JARIG</p>
                            @endif
                        </div>
                    </div>
                    <div class="row"></div>
                </div>
            </div>
        @endforeach


        {{--<div class="panel panel-default col-md-1 kalender">--}}
            {{--<div class="panel-heading months-panel">January</div>--}}
            {{--<div class="panel-body kalender-body">--}}
                {{--@foreach($kalendar->januari as $date)--}}
                    {{--<div class="days col-md-3">--}}
                        {{--{{$date->day}}--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="panel panel-primary col-md-1 kalender">--}}
            {{--<div class="panel-heading months-panel">Februari</div>--}}
            {{--<div class="panel-body kalender-body">--}}
                {{--@foreach($kalendar->februari as $date)--}}
                    {{--<div class="days col-md-3">--}}
                        {{--{{$date->day}}--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="panel panel-info col-md-1 kalender">--}}
            {{--<div class="panel-heading months-panel">Maart</div>--}}
            {{--<div class="panel-body kalender-body">--}}
                {{--@foreach($kalendar->maart as $date)--}}
                    {{--<div class="days col-md-3">--}}
                        {{--{{$date->day}}--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="panel panel-success col-md-1 kalender">--}}
            {{--<div class="panel-heading months-panel">April</div>--}}
            {{--<div class="panel-body kalender-body">--}}
                {{--@foreach($kalendar->april as $date)--}}
                    {{--<div class="days col-md-3">--}}
                        {{--{{$date->day}}--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="panel panel-warning col-md-1 kalender">--}}
            {{--<div class="panel-heading months-panel">Mei</div>--}}
            {{--<div class="panel-body kalender-body">--}}
                {{--@foreach($kalendar->mei as $date)--}}
                    {{--<div class="days col-md-3">--}}
                        {{--{{$date->day}}--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="panel panel-default col-md-1 kalender">--}}
            {{--<div class="panel-heading months-panel">Juni</div>--}}
            {{--<div class="panel-body kalender-body">--}}
                {{--@foreach($kalendar->juni as $date)--}}
                    {{--<div class="days col-md-3">--}}
                        {{--{{$date->day}}--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="panel panel-primary col-md-1 kalender">--}}
            {{--<div class="panel-heading months-panel">Juli</div>--}}
            {{--<div class="panel-body kalender-body">--}}
                {{--@foreach($kalendar->juli as $date)--}}
                    {{--<div class="days col-md-3">--}}
                        {{--{{$date->day}}--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="panel panel-info col-md-1 kalender">--}}
            {{--<div class="panel-heading months-panel">Augustus</div>--}}
            {{--<div class="panel-body kalender-body">--}}
                {{--@foreach($kalendar->augustus as $date)--}}
                    {{--<div class="days col-md-3">--}}
                        {{--{{$date->day}}--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="panel panel-success col-md-1 kalender">--}}
            {{--<div class="panel-heading months-panel">September</div>--}}
            {{--<div class="panel-body kalender-body">--}}
                {{--@foreach($kalendar->september as $date)--}}
                    {{--<div class="days col-md-3">--}}
                        {{--{{$date->day}}--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="panel panel-warning col-md-1 kalender">--}}
            {{--<div class="panel-heading months-panel">Oktober</div>--}}
            {{--<div class="panel-body kalender-body">--}}
                {{--@foreach($kalendar->oktober as $date)--}}
                    {{--<div class="days col-md-3">--}}
                        {{--{{$date->day}}--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="panel panel-default col-md-1 kalender">--}}
            {{--<div class="panel-heading months-panel">November</div>--}}
            {{--<div class="panel-body kalender-body">--}}
                {{--@foreach($kalendar->november as $date)--}}
                    {{--<div class="days col-md-3">--}}
                        {{--{{$date->day}}--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="panel panel-primary col-md-1 kalender">--}}
            {{--<div class="panel-heading months-panel">December</div>--}}
            {{--<div class="panel-body kalender-body">--}}
                {{--@foreach($kalendar->december as $date)--}}
                    {{--<div class="days col-md-3">--}}
                        {{--{{$date->day}}--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>

</div>