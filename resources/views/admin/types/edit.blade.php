@extends('layouts.admin')

@section('content')
<section class="content-header">
      <h1>
       Edit Types      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/types')}}">Types</a></li>
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

                        {!! Form::model($type, [
                            'method' => 'PATCH',
                            'url' => ['/admin/types', $type->type_id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}
 <div class="box-body">

    <div class="input-field col s12">
    <label class="active" for="first_name2">Type Name</label>
     {!! Form::text('typeName', null, ['class' => 'form-control','required']) !!}
      
    </div>    
 
    <div class="input-field col s12">
    <label class="active" for="first_name2">Density</label>
    <select name="densityId" class="form-control">      
      @foreach($density as $data)
      <option value="{{ $data->density_id }}"   @if($data->density_id==$type->densityId) selected='selected' @endif >{{ $data->densityName }}</option>
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