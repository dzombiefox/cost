<div class="form-group {{ $errors->has('densityName') ? 'has-error' : ''}}">
    {!! Form::label('densityName', 'Densityname', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('densityName', null, ['class' => 'form-control']) !!}
        {!! $errors->first('densityName', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>