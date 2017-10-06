@extends('layouts.admin')

@section('content')
<script>
$(document).ready(function(){
    $(".data").select2();
     $(".size").select2();
     $(".status").select2();
    });

</script>
 <section class="content-header">
      <h1>
       &nbsp;
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/formulas')}}">Formulas</a></li>
        <li class="active">Data</li>
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

                        {!! Form::open(['url' => '/admin/formulas', 'class' => 'form-horizontal', 'files' => true]) !!}
<div class="box-body">


    <label>Data</label>   
    <div class="input-field col s12">
    <select name="dataId" class="form-control data">      
      @foreach($datas as $data)
      <option value="{{$data->data_id}}">{{$data->name}}</option>
      @endforeach
    </select>
    </div>
 

    <label>Size</label>   
    <div class="input-field col s12">
         <select name="sizeId" class="form-control size">      
      @foreach($sizes as $data)
      <option value="{{$data->size_id}}">{{$data->size}}</option>
      @endforeach
    </select>
        {!! $errors->first('sizeId', '<p class="help-block">:message</p>') !!}
    </div>

    <label>Status</label>
    <div class="input-field col s12">
    <select name="statusId" class="form-control status">      
      @foreach($status as $data)
      <option value="{{$data->status_id}}">{{$data->statusName}}</option>
      @endforeach
    </select>
    </div>
    
<label>Value</label>
    <div class="input-field col s12">
     {!! Form::text('value', null, ['class' => 'form-control','required']) !!}
     
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