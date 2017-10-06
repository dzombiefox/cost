<div class="form-group {{ $errors->has('pastaId') ? 'has-error' : ''}}">
    {!! Form::label('pastaId', 'Pastaid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('pastaId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('pastaId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('itemId') ? 'has-error' : ''}}">
    {!! Form::label('itemId', 'Itemid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('itemId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('itemId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('dvolume') ? 'has-error' : ''}}">
    {!! Form::label('dvolume', 'Dvolume', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('dvolume', null, ['class' => 'form-control']) !!}
        {!! $errors->first('dvolume', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>