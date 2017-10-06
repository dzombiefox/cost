<div class="form-group {{ $errors->has('motifId') ? 'has-error' : ''}}">
    {!! Form::label('motifId', 'Motifid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('motifId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('motifId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('sizeId') ? 'has-error' : ''}}">
    {!! Form::label('sizeId', 'Sizeid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('sizeId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('sizeId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('colorId') ? 'has-error' : ''}}">
    {!! Form::label('colorId', 'Colorid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('colorId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('colorId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('opt') ? 'has-error' : ''}}">
    {!! Form::label('opt', 'Opt', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('opt', null, ['class' => 'form-control']) !!}
        {!! $errors->first('opt', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('month') ? 'has-error' : ''}}">
    {!! Form::label('month', 'Month', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('month', null, ['class' => 'form-control']) !!}
        {!! $errors->first('month', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
    {!! Form::label('year', 'Year', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('year', null, ['class' => 'form-control']) !!}
        {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('bodyId') ? 'has-error' : ''}}">
    {!! Form::label('bodyId', 'Bodyid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('bodyId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('bodyId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('aluminaId') ? 'has-error' : ''}}">
    {!! Form::label('aluminaId', 'Aluminaid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('aluminaId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('aluminaId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('engobeId') ? 'has-error' : ''}}">
    {!! Form::label('engobeId', 'Engobeid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('engobeId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('engobeId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('glazeId') ? 'has-error' : ''}}">
    {!! Form::label('glazeId', 'Glazeid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('glazeId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('glazeId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('dropId') ? 'has-error' : ''}}">
    {!! Form::label('dropId', 'Dropid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('dropId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('dropId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('userId') ? 'has-error' : ''}}">
    {!! Form::label('userId', 'Userid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('userId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('userId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('userId') ? 'has-error' : ''}}">
    {!! Form::label('userId', 'Userid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('userId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('userId', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>