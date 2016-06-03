@extends('app')

@section('head')
    {{--<link rel="stylesheet" href="{{ asset('css/jscroll/jscrollpane.css') }}" type="text/css">--}}
    {{--<link rel="stylesheet" href="{{ asset('css/bootstrap-switch/bootstrap-switch.min.css') }}" type="text/css">--}}
@stop

@section('content')
    <div class="container-fluid">
        <div class="jumbotron top-head col-md-12" style="padding-bottom: 0 !important;">
            <div class="col-md-8" style="padding: 20px"><a href="{{url('/')}}" class="navbar-brand" style="padding: 0;"><h1 style="margin: 0">Contact Beheer</h1></a></div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::check())
                            <li><span class="navbar-text">Welcome
                                    <a href="profile" class="navbar-link">
                                        {{ Auth::user()->name }}
                                    </a></span></li>
                            <li><a href="{{url('logout')}}"><span class="glyphicon glyphicon-user"></span> Uitloggen</a></li>
                            @if(Auth::check())
                                @if(Auth::user()->role_id == 1)
                                    <li><a href="{{ route('admin.account.index') }}">Accounts</a></li>
                                @endif
                            @endif
                        @endif
                    </ul>
                </div>
                {{--<div class="col-md-6 col-md-offset-6">--}}

                {{--</div>--}}
            </div>
        </div>

    @include('front.partial.kalendar')


    @yield('front_content')
    </div>
@stop

@section('footer')
    <!-- the mousewheel plugin - optional to provide mousewheel support -->
    {{--<script type="text/javascript" src="{{asset('js/jquery.Mousewheel/Mousewheel.js')}}"></script>--}}
    {{--<script type="text/javascript" src="{{asset('js/jquery.Mousewheel/mwheelIntent.js')}}"></script>--}}

    {{--<!-- the jScrollPane script -->--}}
    {{--<script type="text/javascript" src="{{asset('js/jScrollPane/jScrollPane.js')}}"></script>--}}
    {{--<script type="text/javascript" src="{{asset('js/jScrollPane/jScrollPane.js')}}"></script>--}}

    {{--<script type="text/javascript" src="{{asset('js/bootstrap-switch/bootstrap-switch.min.js')}}"></script>--}}

@stop

