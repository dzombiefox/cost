@extends('layouts.admin')

@section('content')
<script>
$(document).ready(function(){
    $("#itemId").select2();    
});

</script>

 <section class="content-header">
      <h1>
       Edit Brands      
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

                          
                        {!! Form::model($costitem, [
                            'method' => 'PATCH',
                            'url' => ['/admin/cost-items', $costitem->costItem_id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}
<div class="box-body">

                      
    <div class="input-field col s12">
    <label class="active" for="first_name2">Item Name</label>
        <select name="itemId" id="itemId"  class="form-control">      
      @foreach($item as $data)
      <option value="{{ $data->item_id }}"   @if($data->item_id==$costitem->itemId) selected='selected' @endif >{{ $data->itemCode }}</option>
      @endforeach
    </select>
    </div>
 
     
    <div class="input-field col s12">
    <label class="active" for="first_name2">Periode</label>
    <select name="periodeId" class="form-control">      
      @foreach($periode as $data)
      <option value="{{ $data->periode_id }}"   @if($data->periode_id==$costitem->periodeId) selected='selected' @endif >{{ $data->periodeName }}</option>
     
      @endforeach
    </select>
    </div> 

    <div class="input-field col s12">
    <label class="active" for="first_name2">Price</label>
     {!! Form::text('itemPrice', null, ['class' => 'form-control','required']) !!}
      
    </div>    

    <div class="input-field col s12">
    <label class="active" for="first_name2">Year</label>
     {!! Form::text('year', null, ['class' => 'form-control','required']) !!}
     
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