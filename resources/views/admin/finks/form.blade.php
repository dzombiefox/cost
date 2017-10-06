<div class="form-group {{ $errors->has('finishId') ? 'has-error' : ''}}">
    {!! Form::label('finishId', 'Finishid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('finishId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('finishId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('inkId') ? 'has-error' : ''}}">
    {!! Form::label('inkId', 'Inkid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('inkId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('inkId', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>