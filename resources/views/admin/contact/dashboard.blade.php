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
                    Contact
                </h3>
            </div>

            <div class="box-body">
                <div class="inline-div">
                    <div class="title-name"><strong>Voornaam:</strong></div>
                    <div>{{ $contact->voornaam }}</div>
                </div>
                <div class="inline-div">
                    <div class="title-name"><strong>Achternaam:</strong></div>
                    <div>{{ $contact->achternaam }}</div>
                </div>
                <div class="inline-div">
                    <div class="title-name"><strong>Geboortedatum:</strong></div>
                    <div>{{ $contact->geboortedatum }}</div>
                </div>
                <div class="inline-div">
                    <div class="title-name"><strong>Relatie:</strong></div>
                    <div>{{ $contact->relation->type }}</div>
                </div>
            </div>
            {{--<div class="overlay">--}}
                {{--<i class="fa fa-refresh fa-spin"></i>--}}
            {{--</div>--}}
        </div>

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Emails
                </h3>
                <div class="box-tools pull-right">
                    <button id="email_save_button" class="btn btn-box-tool btn-success btn-sm">
                        <span style="color:white" class="glyphicon glyphicon-floppy-disk"></span>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <table id="email_table" class="table table-striped table-bordered contactInfo">
                    <thead>
                        <tr>
                            <td>Email</td>
                            <td>Acties</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($emails as $email)
                        <tr>
                            <td><span class="email_edit">{{ $email->email }}</span></td>
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

        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Telefoonnummers
                </h3>
            </div>
            <div class="box-body">
                <table id="tel_table" class="table table-striped table-bordered contactInfo">
                    <thead>
                        <tr>
                            <td>Telefoonnummer</td>
                            <td>Acties</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($phonenumbers as $phone)
                        <tr>
                            <td>{{ $phone->telefoonnummer }}</td>
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

        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Banknummers
                </h3>
            </div>
            <div class="box-body">
                <table id="bank_table" class="table table-striped table-bordered contactInfo">
                    <thead>
                        <tr>
                            <td>Banknummer</td>
                            <td>Acties</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($banknumbers as $bank)
                        <tr>
                            <td>{{ $bank->banknummer }}</td>
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

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Adressen
                </h3>
            </div>
            <div class="box-body">
                <table id="address_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <td>Straat</td>
                        <td>Huisnummer</td>
                        <td>Toevoeging</td>
                        <td>Plaats</td>
                        <td>acties</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($addresses as $address)
                        <tr>
                            <td>{{ $address->straat }}</td>
                            <td>{{ $address->huisnummer }}</td>
                            <td>{{ $address->toevoeging }}</td>
                            <td>{{ $address->plaats }}</td>
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