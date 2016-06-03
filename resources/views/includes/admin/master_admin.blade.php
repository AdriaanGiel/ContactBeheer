@extends('admin-app')
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">--}}
    {{--<link rel="stylesheet" href="{{asset('css/admin/main.css')}}">--}}
@stop

    @section('header')
        <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>LTE</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">Alexander Pierce</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        Alexander Pierce - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    @stop

    @section('sidebar')
        @include('includes.admin.sidebar_admin')
    @stop
    @section('content')

        @yield('admin_content')

    @stop

    @section('footer')
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.3.3
                </div>
                <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
                reserved.
            </footer>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">

                    </div>
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">


                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
                <script src="{{asset('js/admin/main.js')}}"></script>
        </div>
        <script>
            $(document).ready(function(){
                $('body').addClass('hold-transition skin-blue sidebar-mini');
                $('#user_table').DataTable({
                    "columns": [
                        {"width":"10%"},
                        null,
                        null,
                        null,
                        null,
                        { "width":"15%" }
                    ]
                });

                $('.contactInfo').DataTable({
                    "columns": [
                        {"width":"80%"},
                        {"width":"20%"}
                    ]
                });

                $('#address_table').DataTable();

                var emails = $('.email_edit').clone();


                var test = excelEdit();




                $('#email_save_button').on('click',function (e) {
                    var check_email = $('.email_edit');

                    console.log(emails[0]);
                    for(var i = 0; i < $(emails).length; i++){
                        if($(emails[i]).text() != $(check_email[i]).text()){
                            console.log('yup')
                        }
                    }
                })
            });

            function excelEdit(){
                $(document).on('dblclick','.email_edit',function (e) {
                    var $this = $(this);
                    var text = $this.text();
                    //returnNormal($(this).find('.email_input_edit'));
                    $this.empty();
                    $this.append('<input class="form-control input email_input_edit" type="text" value="'+text+'">');

                    return returnNormal($this);
                });

            }

            function returnNormal(element){
                $(document).on('click',function(e){
                    console.log(e);
                    var container = $(element);
                    var text = $(container).find('.email_input_edit').val();

                    //console.log(text);
                    if(!$(e.target).is(container) && !$(e.target).parents().is(container)){
                        console.log('asddas');
                        container.empty();
                        container.append(text);
                    }

                });
            }
        </script>

    @stop



