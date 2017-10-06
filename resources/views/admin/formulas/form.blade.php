<div class="form-group {{ $errors->has('dataId') ? 'has-error' : ''}}">
    {!! Form::label('dataId', 'Dataid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('dataId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('dataId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('sizeId') ? 'has-error' : ''}}">
    {!! Form::label('sizeId', 'Sizeid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('sizeId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('sizeId', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <select name="status">      
      <option >kering</option>
      <option >basah</option>   
    </select>
    
</div>
<div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
    {!! Form::label('value', 'Value', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('value', null, ['class' => 'form-control']) !!}
        {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('userId') ? 'has-error' : ''}}">
    {!! Form::label('userId', 'Userid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('userId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('userId', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="input-field col s12">
        <button class="btn waves-effect waves-light right red" type="submit" name="action">SAVE ITEM
    <i class="material-icons right">send</i>
        </button>
    </div> 