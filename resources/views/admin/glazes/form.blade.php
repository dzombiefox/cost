<div class="form-group {{ $errors->has('glazeName') ? 'has-error' : ''}}">
    {!! Form::label('glazeName', 'Glazename', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('glazeName', null, ['class' => 'form-control']) !!}
        {!! $errors->first('glazeName', '<p class="help-block">:message</p>') !!}
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
<div class="form-group {{ $errors->has('weightWet') ? 'has-error' : ''}}">
    {!! Form::label('weightWet', 'Weightwet', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('weightWet', null, ['class' => 'form-control']) !!}
        {!! $errors->first('weightWet', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('status', null, ['class' => 'form-control']) !!}
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>