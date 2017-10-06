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
<div class="form-group {{ $errors->has('skw_1') ? 'has-error' : ''}}">
    {!! Form::label('skw_1', 'Skw 1', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('skw_1', null, ['class' => 'form-control']) !!}
        {!! $errors->first('skw_1', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('skw_2') ? 'has-error' : ''}}">
    {!! Form::label('skw_2', 'Skw 2', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('skw_2', null, ['class' => 'form-control']) !!}
        {!! $errors->first('skw_2', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('skw_3') ? 'has-error' : ''}}">
    {!! Form::label('skw_3', 'Skw 3', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('skw_3', null, ['class' => 'form-control']) !!}
        {!! $errors->first('skw_3', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('skw_4') ? 'has-error' : ''}}">
    {!! Form::label('skw_4', 'Skw 4', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('skw_4', null, ['class' => 'form-control']) !!}
        {!! $errors->first('skw_4', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('skw_5') ? 'has-error' : ''}}">
    {!! Form::label('skw_5', 'Skw 5', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('skw_5', null, ['class' => 'form-control']) !!}
        {!! $errors->first('skw_5', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('salesInc') ? 'has-error' : ''}}">
    {!! Form::label('salesInc', 'Salesinc', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('salesInc', null, ['class' => 'form-control']) !!}
        {!! $errors->first('salesInc', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('salesBonus') ? 'has-error' : ''}}">
    {!! Form::label('salesBonus', 'Salesbonus', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('salesBonus', null, ['class' => 'form-control']) !!}
        {!! $errors->first('salesBonus', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('periodeId') ? 'has-error' : ''}}">
    {!! Form::label('periodeId', 'Periodeid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('periodeId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('periodeId', '<p class="help-block">:message</p>') !!}
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