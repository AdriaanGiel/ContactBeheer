<div class="col-md-12">
    <h3>Adress gegevens</h3>
</div>
<div class="form-group col-md-6">
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
        {!! Form::text('straat',null,['class' => 'form-control','placeholder' => 'Straatnaam']) !!}
    </div>
</div>

<div class="form-group col-md-3">
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-tag"></span></div>
        {!! Form::text('huisnummer',null,['class' => 'form-control','placeholder' => 'Nummer']) !!}
    </div>
</div>

<div class="form-group col-md-3">
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-font"></span></div>
        {!! Form::text('toevoeging',null,['class' => 'form-control','placeholder' => 'Toev']) !!}
    </div>
</div>

<div class="form-group col-md-6">
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-tag"></span></div>
        {!! Form::text('postcode',null,['class' => 'form-control','placeholder' => 'Postcode']) !!}
    </div>
</div>

<div class="form-group col-md-6">
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
        {!! Form::text('plaats',null,['class' => 'form-control','placeholder' => 'Plaats']) !!}
    </div>
</div>
