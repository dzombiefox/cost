@extends('layouts.admin')
@section('content')
<section class="content-header">
      <h1>
       Edit Formulas      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/cost-items')}}">Cost Items</a></li>
        <li class="active">Create</li>
      </ol>
    </section>
  <section class="content">

      <div class="row">

        <!-- left column -->
        <div class="col-md-12">

          <!-- general form elements -->
          <div class="box box-primary">
       @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($formula, [
                            'method' => 'PATCH',
                            'url' => ['/admin/formulas', $formula->formula_id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                      
    <div class="box-body">
        
    <div class="input-field col s12">
    <label>Data</label>
       <select name="dataId" class="form-control">      
      @foreach($datas as $data)
        <option value="{{ $data->data_id }}"   @if($data->data_id==$formula->dataId) selected='selected' @endif >{{ $data->name }}</option>      
      @endforeach
    </select>
    </div>
   
     
    <div class="input-field col s12">
    <label>Size</label>
       <select name="sizeId" class="form-control">      
      @foreach($sizes as $data)
        <option value="{{ $data->size_id }}"   @if($data->size_id==$formula->sizeId) selected='selected' @endif >{{ $data->size }}</option>
      
      @endforeach
    </select>
   
    
    <div class="input-field col s12">
    <label>Status</label>
       <select name="statusId" class="form-control">      
      @foreach($status as $data)
        <option value="{{ $data->status_id }}"   @if($data->status_id==$formula->statusId) selected='selected' @endif >{{ $data->statusName }}</option>
      @endforeach
    </select>
   
    
</div>

    <div class="input-field col s12">
    <label>Value</label>
     {!! Form::text('value', null, ['class' => 'form-control']) !!}

    </div>    



<div class="right ">
<label>&nbsp;</label>
<br>
        <button class="btn btn-sm btn-primary pull-right" type="submit" name="action" id="save"><i class="fa fa-save" aria-hidden="true"></i>&nbsp;SAVE
    
        </button>        
                                            
                                          
</div>
 

                        {!! Form::close() !!}

    </div>

</div>
        </div>
    </div>
 
    </section>

@endsection