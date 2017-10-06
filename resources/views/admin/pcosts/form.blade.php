<div class="form-group {{ $errors->has('sizeId') ? 'has-error' : ''}}">
    {!! Form::label('sizeId', 'Sizeid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('sizeId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('sizeId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('capacity') ? 'has-error' : ''}}">
    {!! Form::label('capacity', 'Capacity', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('capacity', null, ['class' => 'form-control']) !!}
        {!! $errors->first('capacity', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('f_employeeBenefit') ? 'has-error' : ''}}">
    {!! Form::label('f_employeeBenefit', 'F Employeebenefit', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('f_employeeBenefit', null, ['class' => 'form-control']) !!}
        {!! $errors->first('f_employeeBenefit', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('f_fuelExp') ? 'has-error' : ''}}">
    {!! Form::label('f_fuelExp', 'F Fuelexp', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('f_fuelExp', null, ['class' => 'form-control']) !!}
        {!! $errors->first('f_fuelExp', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('f_waterElectict') ? 'has-error' : ''}}">
    {!! Form::label('f_waterElectict', 'F Waterelectict', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('f_waterElectict', null, ['class' => 'form-control']) !!}
        {!! $errors->first('f_waterElectict', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('f_packingExp') ? 'has-error' : ''}}">
    {!! Form::label('f_packingExp', 'F Packingexp', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('f_packingExp', null, ['class' => 'form-control']) !!}
        {!! $errors->first('f_packingExp', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('f_maintenanceExp') ? 'has-error' : ''}}">
    {!! Form::label('f_maintenanceExp', 'F Maintenanceexp', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('f_maintenanceExp', null, ['class' => 'form-control']) !!}
        {!! $errors->first('f_maintenanceExp', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('f_depreciationExp') ? 'has-error' : ''}}">
    {!! Form::label('f_depreciationExp', 'F Depreciationexp', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('f_depreciationExp', null, ['class' => 'form-control']) !!}
        {!! $errors->first('f_depreciationExp', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('f_otherExp') ? 'has-error' : ''}}">
    {!! Form::label('f_otherExp', 'F Otherexp', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('f_otherExp', null, ['class' => 'form-control']) !!}
        {!! $errors->first('f_otherExp', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('c_salary') ? 'has-error' : ''}}">
    {!! Form::label('c_salary', 'C Salary', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('c_salary', null, ['class' => 'form-control']) !!}
        {!! $errors->first('c_salary', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('c_employeeBenefit') ? 'has-error' : ''}}">
    {!! Form::label('c_employeeBenefit', 'C Employeebenefit', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('c_employeeBenefit', null, ['class' => 'form-control']) !!}
        {!! $errors->first('c_employeeBenefit', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('c_carriageCharge') ? 'has-error' : ''}}">
    {!! Form::label('c_carriageCharge', 'C Carriagecharge', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('c_carriageCharge', null, ['class' => 'form-control']) !!}
        {!! $errors->first('c_carriageCharge', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('c_otherExp') ? 'has-error' : ''}}">
    {!! Form::label('c_otherExp', 'C Otherexp', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('c_otherExp', null, ['class' => 'form-control']) !!}
        {!! $errors->first('c_otherExp', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('c_mktOperational') ? 'has-error' : ''}}">
    {!! Form::label('c_mktOperational', 'C Mktoperational', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('c_mktOperational', null, ['class' => 'form-control']) !!}
        {!! $errors->first('c_mktOperational', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('c_salesIncentives') ? 'has-error' : ''}}">
    {!! Form::label('c_salesIncentives', 'C Salesincentives', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('c_salesIncentives', null, ['class' => 'form-control']) !!}
        {!! $errors->first('c_salesIncentives', '<p class="help-block">:message</p>') !!}
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