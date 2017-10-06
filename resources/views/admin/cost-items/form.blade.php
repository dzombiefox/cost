<div class="form-group {{ $errors->has('itemId') ? 'has-error' : ''}}">
    {!! Form::label('itemId', 'Itemid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('itemId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('itemId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('periodeId') ? 'has-error' : ''}}">
    {!! Form::label('periodeId', 'Periodeid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('periodeId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('periodeId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('itemPrice') ? 'has-error' : ''}}">
    {!! Form::label('itemPrice', 'Itemprice', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('itemPrice', null, ['class' => 'form-control']) !!}
        {!! $errors->first('itemPrice', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
    {!! Form::label('year', 'Year', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('year', null, ['class' => 'form-control']) !!}
        {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
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