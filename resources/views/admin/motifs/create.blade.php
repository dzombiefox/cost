@extends('layouts.admin')
@section('content')
<script>
$(document).ready(function(){
    $(".type").select2();
     $(".brand").select2();
     $(".opt").select2();
    });

</script>
 <section class="content-header">
      <h1>
       Data Brands      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/motifs')}}">Motifs</a></li>
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

                        {!! Form::open(['url' => '/admin/motifs', 'class' => 'form-horizontal', 'files' => true]) !!}
<div class="box-body"> 

    <div class="input-field col s12">
     <label class="active" for="first_name2">Motif Code</label>
     {!! Form::text('motifCode', null, ['class' => 'form-control','required']) !!}
     
    </div>    
 

    <div class="input-field col s12">
     <label class="active" for="first_name2">Motif Name</label>
     {!! Form::text('motifName', null, ['class' => 'form-control','required']) !!}
     
    </div>    
 

    <div class="input-field col s12">
     <label class="active" for="first_name2">Type</label>
    <select name="typeId" class="form-control type">      
      @foreach($type as $data)
      <option value="{{$data->type_id}}">{{$data->typeName}}</option>
      @endforeach
    </select>
    </div>
   

    <div class="input-field col s12">
     <label class="active" for="first_name2">Brand</label>
    <select name="brandId" class="form-control brand">      
      @foreach($brand as $data)
      <option value="{{$data->brand_id}}">{{$data->brandName}}</option>
      @endforeach
    </select>
    </div>

    <div class="input-field col s12">
    <label class="active" for="first_name2">Option</label>
    <select name="optionId" class="form-control opt">      
      @foreach($option as $data)
      <option value="{{$data->option_id}}">{{$data->optionName}}</option>
      @endforeach
    </select>
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