@extends('layouts.admin')

@section('content')
<script type="text/javascript">

function empty(){
        $(".skw1").val("");
        $(".skw2").val("");
        $(".skw3").val("");
        $(".skw4").val("");
        $(".skw5").val("");
       
        $('.alert').html("");
        enable();
}
function disable(){
  $(".motif").attr("disabled",'disabled');
  $(".size").attr("disabled",'disabled');
  $(".color").attr("disabled",'disabled');
  $(".year").attr("disabled",'disabled');
  $(".periode").attr("disabled",'disabled');
  $(".skw1").attr("disabled",'disabled');
  $(".skw2").attr("disabled",'disabled');
  $(".skw3").attr("disabled",'disabled');
  $(".skw4").attr("disabled",'disabled');
  $(".skw5").attr("disabled",'disabled');

  $(".save").attr("disabled",'disabled');
}
function enable(){
      $(".motif").removeAttr("disabled");
      $(".size").removeAttr("disabled");
      $(".color").removeAttr("disabled");
      $(".year").removeAttr("disabled");
      $(".periode").removeAttr("disabled");
      $(".skw1").removeAttr("disabled");
      $(".skw2").removeAttr("disabled");
      $(".skw3").removeAttr("disabled");
      $(".skw4").removeAttr("disabled");
      $(".skw5").removeAttr("disabled");
    
      $(".save").removeAttr("disabled");
}
  $(document).ready(function(){
    disable();
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
            url:frm.attr('action'),
            type:frm.attr('method'),
            data:frm.serialize(),
            success:function(){
               $(".alert").html('<div class="alert alert-success alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i>Success Add ITEM Price !!   <a href="{{url('/admin/pricess')}}" title="Back" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> View</a> </h4></div>');
             disable();
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
        <li class="active">Create</li>
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

                        {!! Form::open(['url' => '/admin/prices', 'class' => 'form-horizontal form-save', 'files' => true]) !!}

                      <div class="box-body"> 
<div class="form-group" style="margin-right: 15px">
   <label class="control-label col-sm-1">Motif</label>
   <div class="col-md-3">
<select name="motifId" class="form-control motif">
         @foreach($motifs as $data)
         <option value="{{$data->motif_id}}">{{$data->motifName}}</option>
         @endforeach
</select>
   </div>
    <label class="control-label col-sm-1">Size</label>
     <div class="col-md-1">
       <select name="sizeId" class="form-control size">
          @foreach($sizes as $data)
         <option value="{{$data->size_id}}">{{$data->size}}</option>
         @endforeach
       </select>
     </div>
     <label class="control-label col-sm-1">Color</label>
     <div class="col-md-1">
      <select name="colorId" class="form-control color">
          @foreach($colors as $data)
         <option value="{{$data->color_id}}">{{$data->colorName}}</option>
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
              <option value="{{$data->periode_id}}">{{$data->periodeName}}</option>
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
   <i class="fa fa-save" aria-hidden="true"></i>&nbsp;SAVE
        </button>    
            <a class="btn btn-xl btn-danger waves-effect waves-light  " onclick="empty()">    <!-- <i class="material-icons">mode_edit</i> --><i class="fa fa-plus" aria-hidden="true"></i></a>   
          
 
                                          
  </div>
     
</div>
</fieldset>


   
</div>

                        {!! Form::close() !!}
<div class="alert"></div>
                    </div>
                </div>
            </div>

       </section>
@endsection