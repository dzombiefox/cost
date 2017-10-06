<div class="form-group {{ $errors->has('typeName') ? 'has-error' : ''}}">
    {!! Form::label('typeName', 'Typename', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('typeName', null, ['class' => 'form-control']) !!}
        {!! $errors->first('typeName', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('densityId') ? 'has-error' : ''}}">
    {!! Form::label('densityId', 'Densityid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('densityId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('densityId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>