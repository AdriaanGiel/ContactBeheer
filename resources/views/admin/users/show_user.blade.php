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
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Contacten
                </h3>
            </div>
            <div class="box-body">
                <table id="contact_table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Voornaam</td>
                            <td>Achternaam</td>
                            <td>Geboortedatum</td>
                            <td>Kalender</td>
                            <td>Opmerking</td>
                            <td>acties</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->voornaam }}</td>
                            <td>{{ $contact->achternaam }}</td>
                            <td>{{ $contact->geboortedatum }}</td>
                            <td>{{ $contact->opnemen_kalender }}</td>
                            <td>{{ $contact->remark->opmerking }}</td>
                            <td>
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