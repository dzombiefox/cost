<div class="form-group {{ $errors->has('bodyId') ? 'has-error' : ''}}">
    {!! Form::label('bodyId', 'Bodyid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('bodyId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('bodyId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('itemId') ? 'has-error' : ''}}">
    {!! Form::label('itemId', 'Itemid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('itemId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('itemId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('volume') ? 'has-error' : ''}}">
    {!! Form::label('volume', 'Volume', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('volume', null, ['class' => 'form-control']) !!}
        {!! $errors->first('volume', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    {!! Form::label('category', 'Category', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('category', null, ['class' => 'form-control']) !!}
        {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>