@extends('includes/admin/master_admin')

@section('admin_content')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           <div class="box box-primary">
               <div class="box-header with-border">
                   <h3 class="box-title">
                       Users
                   </h3>
               </div>
               <div class="box-body">
                   <table id="user_table" class="table table-striped table-bordered">
                       <thead>
                           <tr>
                               <td>ID</td>
                               <td>Naam</td>
                               <td>Email</td>
                               <td>Aangemaakt</td>
                               <td>Gewijzigd</td>
                               <td>acties</td>
                           </tr>

                       </thead>
                       <tbody>
                       @foreach($users as $user)
                           <tr>
                               <td>{{ $user->id }}</td>
                               <td>{{ $user->name }}</td>
                               <td>{{ $user->email }}</td>
                               <td>{{ $user->created_at }}</td>
                               <td>{{ $user->updated_at }}</td>
                               <td>
                                    <button class="btn btn-xs btn-primary">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </button>
                                    <button class="btn btn-xs btn-warning">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    <button class="btn btn-xs btn-danger">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                               </td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
               </div>
           </div>
        </section>
        <!-- /.content -->
    </div>
        <!-- /.content-wrapper -->
@stop
