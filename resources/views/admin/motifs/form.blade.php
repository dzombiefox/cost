<div class="form-group {{ $errors->has('motifCode') ? 'has-error' : ''}}">
    {!! Form::label('motifCode', 'Motifcode', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('motifCode', null, ['class' => 'form-control']) !!}
        {!! $errors->first('motifCode', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('motifName') ? 'has-error' : ''}}">
    {!! Form::label('motifName', 'Motifname', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('motifName', null, ['class' => 'form-control']) !!}
        {!! $errors->first('motifName', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('typeId') ? 'has-error' : ''}}">
    {!! Form::label('typeId', 'Typeid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('typeId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('typeId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('brandId') ? 'has-error' : ''}}">
    {!! Form::label('brandId', 'Brandid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('brandId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('brandId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('optionId') ? 'has-error' : ''}}">
    {!! Form::label('optionId', 'Optionid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('optionId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('optionId', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>