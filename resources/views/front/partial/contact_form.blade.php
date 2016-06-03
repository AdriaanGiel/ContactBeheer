<div class="form-group col-md-6">
    <label for="relatie">Contact-groep:</label>
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-list"></span></div>
        <div class="form-group">
            {!! Form::select('relation_id', $relation_array, null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group col-md-12">
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
        {!! Form::text('voornaam',null,['class' => 'form-control','placeholder' => 'Voornaam']) !!}
    </div>
</div>

<div class="form-group col-md-12">
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
        {!! Form::text('achternaam',null,['class' => 'form-control', 'placeholder' => 'Achternaam']) !!}
    </div>
</div>

<div class="form-group col-md-3">
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
        {!! Form::input('date','geboortedatum',null,['class' => 'form-control','type' => 'date']) !!}
    </div>
</div>


<div class="form-group col-md-12" style="margin-bottom: 0">
    {!! Form::label('Opmerking','Opmerking:') !!}
    {!! Form::textarea('opmerking',null,['class' => 'form-control', 'rows' => '3','placeholder' => 'Opmerking']) !!}
    <hr>
</div>