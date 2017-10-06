@extends('layouts.admin')
@section('content')
<script type="text/javascript">
    $(document).ready(function(){
        $(".motif").select2();
        $(".size").select2();
        $(".color").select2();
        $(".periode").select2();
        $(".year").select2();
        $(".skw1").number(true,2);
        $(".skw2").number(true,2);
        $(".skw3").number(true,2);
        $(".skw4").number(true,2);
        $(".skw5").number(true,2);
        

        var frm=$(".form-save");
        frm.submit(function(e){
            $.ajax({
                type:frm.attr('method'),
                url:frm.attr('action'),
                data:frm.serialize(),
                success:function(){
                    alert("success update Data !!")
                }
            });
            e.preventDefault();
        });
    });
</script>
    <section class="content-header">
      <h1>
      &nbsp;
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Prices</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">

        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
  <div class="box-header with-border">
              <h3 class="box-title">Master Prices</h3>
            </div>

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($price, [
                            'method' => 'PATCH',
                            'url' => ['/admin/prices', $price->price_id],
                            'class' => 'form-horizontal form-save',
                            'files' => true
                        ]) !!}

                            <div class="box-body"> 
<div class="form-group" style="margin-right: 15px">
   <label class="control-label col-sm-1">Motif</label>
   <div class="col-md-3">
<select name="motifId" class="form-control motif">
         @foreach($motifs as $data)
        <option value="{{ $data->motif_id }}"   @if($data->motif_id==$price->motifId) selected='selected' @endif >{{ $data->motifName }}</option>  
         @endforeach
</select>
   </div>
    <label class="control-label col-sm-1">Size</label>
     <div class="col-md-1">
       <select name="sizeId" class="form-control size">
          @foreach($sizes as $data)
          <option value="{{ $data->size_id }}"   @if($data->size_id==$price->sizeId) selected='selected' @endif >{{ $data->size }}</option>  
         @endforeach
       </select>
     </div>
     <label class="control-label col-sm-1">Color</label>
     <div class="col-md-1">
      <select name="colorId" class="form-control color">
          @foreach($colors as $data)
          <option value="{{ $data->color_id }}"   @if($data->color_id==$price->colorId) selected='selected' @endif >{{ $data->colorName }}</option>  
          @endforeach
       </select>
     </div>
   <label class="control-label col-sm-1">Year/Month</label>
   <div class="col-md-3">
      <select name="year" class="year" style="width: 36%">  
              @foreach($year as $data)
               <option>{{$data->year}}</option>
              @endforeach
           </select>
            <select name="periodeId" class="periode" style="width: 62%">            
              @foreach($periodes as $data)
               <option value="{{ $data->periode_id }}"   @if($data->periode_id==$price->periodeId) selected='selected' @endif >{{ $data->periodeName }}</option>  
              @endforeach
           </select>
   </div>
  


</div> 
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Other Prices</legend>
  
    <div class="form-group" style="margin-right: 15px">
   <label class="control-label col-sm-2">Sell KW 1</label>
   <div class="col-md-2">
 {!! Form::text('skw_1', null, ['class' => 'form-control skw1','value'=>'0,00']) !!}
   </div>
    <label class="control-label col-sm-2">Sell KW 2</label>
     <div class="col-md-2">
       {!! Form::text('skw_2', null, ['class' => 'form-control skw2']) !!}
     </div>
     <label class="control-label col-sm-2">Sales KW 3</label>
     <div class="col-md-2">
       {!! Form::text('skw_3', null, ['class' => 'form-control skw3']) !!}
     </div>
</div>
  
        <div class="form-group" style="margin-right: 15px">
   <label class="control-label col-sm-2">Sell KW4</label>
   <div class="col-md-2">
 {!! Form::text('skw_4', null, ['class' => 'form-control skw4']) !!}
   </div>
    <label class="control-label col-sm-2">Sales KW5</label>
     <div class="col-md-2">
       {!! Form::text('skw_5', null, ['class' => 'form-control skw5']) !!}
     </div>
    
</div>

        <div class="form-group" style="margin-right: 15px">

    <label class="control-label col-sm-2">&nbsp;</label>
     <div class="col-md-2 pull-right">
  
        <button class="btn btn-xl btn-primary waves-effect waves-light red save" type="submit" name="action" >
   <i class="fa fa-save" aria-hidden="true"></i>&nbsp;UPDATE
        </button>    
           
                                          
  </div>
     
</div>
</fieldset>


   
</div>


                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </section>
@endsection