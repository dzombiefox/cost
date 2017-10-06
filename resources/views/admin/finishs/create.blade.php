@extends('layouts.admin')

@section('content')
<script>
    function option(){
        var opt=$("#op").val();
        if(opt==2){
            $(".bpasta").removeAttr("disabled");
            $(".broller").removeAttr("disabled");
            $(".bink").attr("disabled","disabled");            
        }
        else if(opt==3){
            $(".bpasta").attr("disabled","disabled");
            $(".broller").attr("disabled","disabled");
            $(".bink").removeAttr("disabled"); 
        }
        else{
            $(".bpasta").attr("disabled","disabled");
            $(".broller").attr("disabled","disabled");
            $(".bink").attr("disabled","disabled");  
        }        
    }
    function disable(){
        $(".motif").attr("disabled","disabled");
        $(".size").attr("disabled","disabled");
        $(".color").attr("disabled","disabled");
        $(".body").attr("disabled","disabled");
        $(".alumina").attr("disabled","disabled");
        $(".engobe").attr("disabled","disabled");
        $(".drop").attr("disabled","disabled");
        $(".glaze").attr("disabled","disabled");
        $(".opt").attr("disabled","disabled");
        $(".year").attr("disabled","disabled");
        $(".periode").attr("disabled","disabled");
        $(".line").attr("disabled","disabled");
        $(".code").attr("disabled","disabled");
        $("#save").attr("disabled","disabled");
        $(".bpasta").attr("disabled",'disabled');
        $(".bink").attr("disabled",'disabled');
        $(".broller").attr("disabled",'disabled');
        $(".main").attr("disabled","disabled");
    
    }
    
    function enable(){
        $(".motif").removeAttr("disabled");
        $(".size").removeAttr("disabled");
        $(".color").removeAttr("disabled");
        $(".body").removeAttr("disabled");
        $(".alumina").removeAttr("disabled");
        $(".engobe").removeAttr("disabled");
        $(".drop").removeAttr("disabled");
        $(".glaze").removeAttr("disabled");
        $(".opt").removeAttr("disabled");
        $(".year").removeAttr("disabled");
        $(".line").removeAttr("disabled");
        $(".periode").removeAttr("disabled");
        $(".code").removeAttr("disabled");
        $("#save").removeAttr("disabled");
        // $(".main").removeAttr("disabled");
        // $(".bpasta").attr("disabled","disabled");
        // $(".bink").attr("disabled",'disabled');
        // $(".broller").attr("disabled",'disabled');
        $(".tablePasta > tbody").html("");
        $(".tableRoller > tbody").html("");
        $(".tableInk > tbody").html("");
       
    }
    
    function removePasta(id)
    {
        
       $.ajax({
        url: '{{ url('/admin/fpastas') }}' + '/' + id,
        type:"DELETE",
        data: {_method: 'delete', _token :$('meta[name="csrf-token"]').attr('content')},
        success:function(data){
          
         $(".tablePasta > tbody").html("");
                for (i in data)
                    {
                    var future_field = data[i];
                    $('.tablePasta').append('<tr><td>'+future_field.pastaName+'</td><td >'+"<a href='#' class='right btn-floating btn-sm waves-effect waves-light red' onclick='removePasta("+future_field.fpasta_id+")'><i class='material-icons'>delete</i></a>"+'</td></tr>');   
                    }
                              }
    });
    }
        function removeRoller(id)
    {
        
       $.ajax({
        url: '{{ url('/admin/frollers') }}' + '/' + id,
        type:"DELETE",
        data: {_method: 'delete', _token :$('meta[name="csrf-token"]').attr('content')},
        success:function(data){          
         $(".tableRoller > tbody").html("");
                for (i in data)
                    {
                    var future_field = data[i];
                    $('.tableRoller').append('<tr><td>'+future_field.rollerName+'</td><td >'+"<a href='#' class='right btn-floating btn-sm waves-effect waves-light red' onclick='removeRoller("+future_field.froller_id+")'><i class='material-icons'>delete</i></a>"+'</td></tr>');   
                    }
                              }
    });
    }
        function removeInk(id)
    {
        
       $.ajax({
        url: '{{ url('/admin/finks') }}' + '/' + id,
        type:"DELETE",
        data: {_method: 'delete', _token :$('meta[name="csrf-token"]').attr('content')},
        success:function(data){  
                
         $(".tableInk > tbody").html("");
                for (i in data)
                    {
                    var future_field = data[i];
                     $('.tableInk').append('<tr><td>'+future_field.inkName+'</td><td >'+"<a href='#' class='right btn-floating btn-sm waves-effect waves-light red' onclick='removeInk("+future_field.fink_id+")'><i class='material-icons'>delete</i></a>"+'</td></tr>');      
                    }
                         }
    });
    }
    $(document).ready(function(){
    
      $("#new").click(function(){
        enable();
      });
      $('.bpasta').attr('disabled', 'disabled');
      $('.bink').attr('disabled', 'disabled');
      $('.broller').attr('disabled', 'disabled');
      $(".motif").select2();
      $(".size").select2();
      $(".color").select2();
      $(".body").select2();
      $(".alumina").select2();
      $(".engobe").select2();
      $(".glaze").select2();
      $(".drop").select2();
      $(".opt").select2();
      $(".code").select2();
      $(".periode").select2();
      $(".year").select2();
      $(".line").select2();
    disable();
        $(".item").select2();
        // $(".body").select2();
        var frm = $('#form-save');
        var formPasta = $('#form-pasta');
        var formRoller = $('#form-roller');
        var formInk = $('#form-ink');
        var frmall = $('#form-all');
        frm.submit(function(e) {
          var opt=$(".opt").val();
          if(opt==0){
            alert("please choose Option !!")
          }else{
            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
                success: function (data) {
                $(".id").val(data); 
               // Materialize.toast('Data Added !!', 1000);
                disable();
                option();
                                    }  
                                });
          }
          
                e.preventDefault();
           }); 
    formPasta.submit(function(e) {    
                            $.ajax({
                                    type: formPasta.attr('method'),
                                    url: formPasta.attr('action'),
                                    data: formPasta.serialize(),
                                    success: function (data) {
                                      $(".tablePasta > tbody").html("");
                                    for (i in data)
                                    {
                                    var future_field = data[i];  
                                     $('.tablePasta').append('<tr><td>'+future_field.pastaName+'</td><td >'+"<a href='#' class='right btn-floating btn-sm waves-effect waves-light red' onclick='removePasta("+future_field.fpasta_id+")'><i class='material-icons'>delete</i></a>"+'</td></tr>');                                     
                                    }
                                                              
                                     }
                                });
                e.preventDefault();
           });   
    formRoller.submit(function(e) {    
                            $.ajax({
                                    type: formRoller.attr('method'),
                                    url: formRoller.attr('action'),
                                    data: formRoller.serialize(),
                                    success: function (data) {
                                      $(".tableRoller > tbody").html("");
                                    for (i in data)
                                    {
                                    var future_field = data[i];
                                     $('.tableRoller').append('<tr><td>'+future_field.rollerName+'</td><td >'+"<a href='#' class='right btn-floating btn-sm waves-effect waves-light red' onclick='removeRoller("+future_field.froller_id+")'><i class='material-icons'>delete</i></a>"+'</td></tr>');                                       
                                    }
                                                              
                                     }
                                });
                e.preventDefault();
           });    
    formInk.submit(function(e) {    
                            $.ajax({
                                    type: formInk.attr('method'),
                                    url: formInk.attr('action'),
                                    data: formInk.serialize(),
                                    success: function (data) {
                                      $(".tableInk > tbody").html("");
                                    for (i in data)
                                    {
                                    var future_field = data[i];     
                                     $('.tableInk').append('<tr><td>'+future_field.inkName+'</td><td >'+"<a href='#' class='right btn-floating btn-sm waves-effect waves-light red' onclick='removeInk("+future_field.fink_id+")'><i class='material-icons'>delete</i></a>"+'</td></tr>');                                  
                                    }
                                                              
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
        <li><a href="{{url('admin/finishs')}}">Finish Items</a></li>
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
              <h3 class="box-title">Master Finish Item</h3>
            </div>
@if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/finishs', 'class' => 'form-horizontal', 'files' => true,'id'=>'form-save']) !!}
<br>
<div class="form-group" style="margin-right: 15px">
   <label class="control-label col-sm-1">Motif</label>
   <div class="col-md-5">
<select name="motifId" class="motif" style="width: 100%">      
                @foreach($motifs as $data)
                <option value="{{$data->motif_id}}">{{$data->motifName}}</option>
                @endforeach
          </select>
   </div>
    <label class="control-label col-sm-1">Size</label>
     <div class="col-md-2">
       <select name="sizeId" class="size" style="width: 100%">      
                @foreach($size as $data)
                <option value="{{$data->size_id}}">{{$data->size}}</option>
                @endforeach
            </select>
     </div>
     <label class="control-label col-sm-1">Color</label>
     <div class="col-md-2">
        <select name="colorId" class="color" style="width: 100%">      
                @foreach($color as $data)
                <option value="{{$data->color_id}}">{{$data->colorName}}</option>
                @endforeach
            </select>
     </div>
</div>
<div class="form-group" style="margin-right: 15px">
  <label class="control-label col-sm-1">Body</label>
  <div class="col-md-2">
   <select name="bodyId" class="body" style="width: 100%">  
             @foreach($bodys as $data)
             <option value="{{$data->body_id}}">{{$data->bodyName}}&nbsp;{{$data->size}}</option>
             @endforeach
           </select>
</div>
  <label class="control-label col-sm-1">Alumina</label>
  <div class="col-md-2">
  <select name="aluminaId" class="alumina" style="width: 100%">  
             @foreach($aluminas as $data)
             <option value="{{$data->alumina_id}}">{{$data->aluminaName}}</option>
             @endforeach
           </select>
</div>
 <label class="control-label col-sm-1">Engobe</label>
  <div class="col-md-2">
  <select name="engobeId" class="engobe" style="width: 100%">  
             @foreach($engobes as $data)
             <option value="{{$data->engobe_id}}">{{$data->engobeName}}</option>
             @endforeach
           </select>
</div>
 <label class="control-label col-sm-1">Glaze</label>
  <div class="col-md-2">
  <select name="glazeId" class="glaze" style="width: 100%">  
             @foreach($glazes as $data)
             <option value="{{$data->glaze_id}}">{{$data->glazeName}}</option>
             @endforeach
           </select>
</div>
</div>
<div class="form-group" style="margin-right: 15px">
  <label class="control-label col-sm-1">Drop</label>
  <div class="col-md-2">
<select name="dropId" class="drop" style="width: 100%">  
             @foreach($drops as $data)
             <option value="0">No Using Drop</option>
             <option value="{{$data->drop_id}}">{{$data->dropName}}</option>
             @endforeach
           </select>
  </div>

   <label class="control-label col-sm-1">Option</label>
  <div class="col-md-2">
    {!! Form::select('opt', ['Choose','White', 'Pasta', 'Digital Printing'], null, ['class' => 'form-control opt','id'=>'op']) !!}
<!-- <select name="opt" class="opt"  id="op" style="width: 100%">    

               <option value="1">White</option>
               <option value="2">Pasta</option>
               <option value="3">Digital Printing</option>             
           </select> -->
  </div>
   <label class="control-label col-sm-1">Code Ref</label>
  <div class="col-md-2">
<select name="codeRef" class="code" style="width: 100%">            
               <option ><</option>
               <option >></option>
               <option >+</option>
               <option >=</option>      
           </select>
  </div>
   <label class="control-label col-sm-1">Year/Month</label>
   <div class="col-md-2">
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

<div class="form-group" style="margin-right: 15px">

  <label class="control-label col-sm-1">Line</label>
  <div class="col-md-2">
    <select name="lineId" class="line" style="width: 100%">  
              @foreach($lines as $data)
               <option value="{{$data->line_id}}">{{$data->lineName}}</option>
              @endforeach
           </select>
           </div>
     <label class="control-label col-sm-7">&nbsp;</label>      
  <div class="col-md-2">
    <a href="{{ url('admin/finishs') }}" title="Back" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a> 
        <button class="btn btn-sm btn-primary waves-effect waves-light red " type="submit" name="action" id="save">
   <i class="fa fa-save" aria-hidden="true"></i>&nbsp;SAVE
        </button>        
                                            <a class="btn btn-sm btn-danger waves-effect waves-light  " id="new">    <!-- <i class="material-icons">mode_edit</i> --><i class="fa fa-plus" aria-hidden="true"></i></a>
  </div>
</div>

                        {!! Form::close() !!}


                        <div class="box box-primary">
       
           <div class="box-body">


<ul class="nav nav-tabs">

  <li class="active" ><a href="#pasta" data-toggle="tab">ADD PASTA</a></li> 
  <li><a href="#roller" data-toggle="tab">ADD ROLLER</a></li>
  <li><a href="#ink" data-toggle="tab">ADD INK</a></li>
  
</ul>
<!-- Tab panes, ini content dari tab di atas -->
<div class="tab-content">

  <div class="tab-pane active" id="pasta">
  <br>
   <div class="pull-right">
<a href="#"  data-toggle="modal" data-target="#mpasta" ><button class="btn btn-success btn-sm bpasta" data-toggle="modal" data-target="#detailBarang"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Pasta</button></a>

<br>
<br>

                        
</div>
<br>
  <table class="table table-bordered tablePasta">
    <tr>
    <thead>      
        <th>Pasta Name</th>
        <th style="width: 15%">Action</th>
    </thead>
    <tbody>
        
    </tbody>
    </tr>
</table>
</div>
  <div class="tab-pane" id="roller">
  <br>
   <div class="pull-right">

<a href="#"  data-toggle="modal" data-target="#mroller" ><button class="broller btn btn-success btn-sm" data-toggle="modal" data-target="#biaya"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Roller</button></a>
<br>
<br>

                        
</div>
<br>
<table class="table table-bordered tableRoller">
<tr>
<thead>
<th>Roller Name</th>
<th style="width: 15%">Action</th>
</thead>
<tbody>
    
</tbody>
 </table>
 </div>
  

   <div class="tab-pane" id="ink">
  <br>
   <div class="pull-right">

<a href="#"  data-toggle="modal" data-target="#mink" ><button class="bink btn btn-success btn-sm" data-toggle="modal" data-target="#biaya"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Ink</button></a>
<br>
<br>

                        
</div>
<br>
<table class="table table-bordered tableInk">
<tr>
<thead>
<th>Ink Name</th>
<th style="width: 15%">Action</th>
</thead>
<tbody>
    
</tbody>
 </table>
 </div>
  
</div>



           </div>
           </div>
            </div>
            </div>
            </div>
            </section>

                       

  


 <!-- Modal Modal Pasta -->
  <div class="modal fade" id="mpasta" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
        {!! Form::open(['url' => '/admin/fpastas', 'class' => 'form-horizontal','id'=>'form-pasta', 'files' => true]) !!}

           <div class="form-group">
   <label class="control-label col-sm-1">Item</label>
   <div class="col-md-12">
  <select name="pastaId" class="item" style="width: 100%">      
      @foreach($pastas as $data)
      <option value="{{$data->pasta_id}}">{{$data->pastaName}}</option>
      @endforeach
               </select>
   </div>

</div>


          
        </div>
        <div class="modal-footer">
         <input type="text" class="id" name="finishId" readonly="readonly" style="color: white;border:none;background: none" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button class="btn btn-sm btn-primary waves-effect waves-light  red" type="submit" name="action"><i class="fa fa-save" aria-hidden="true"></i>&nbsp;SAVE</button>
           {!! Form::close() !!}
        </div>
      </div>
      
    </div>
  </div>


<!-- Modal Modal Roller -->
  <div class="modal fade" id="mroller" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
       {!! Form::open(['url' => '/admin/frollers', 'class' => 'form-horizontal','id'=>'form-roller', 'files' => true]) !!}


           <div class="form-group">
   <label class="control-label col-sm-1">Item</label>
   <div class="col-md-12">
  <select name="rollerId" class="item" style="width: 100%">      
      @foreach($rollers as $data)
      <option value="{{$data->roller_id}}">{{$data->rollerName}}</option>
      @endforeach
               </select>
   </div>

</div>


          
        </div>
        <div class="modal-footer">
         <input type="text" class="id" name="finishId" readonly="readonly" style="color: white;border:none;background: none" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button class="btn btn-sm btn-primary waves-effect waves-light  red" type="submit" name="action"><i class="fa fa-save" aria-hidden="true"></i>&nbsp;SAVE</button>
           {!! Form::close() !!}
        </div>
      </div>
      
    </div>
  </div>

       
  
<!-- Modal Modal INk -->
  <div class="modal fade" id="mink" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
      {!! Form::open(['url' => '/admin/finks', 'class' => 'form-horizontal','id'=>'form-ink', 'files' => true]) !!}


           <div class="form-group">
   <label class="control-label col-sm-1">Item</label>
   <div class="col-md-12">
  <select name="inkId" class="item" style="width: 100%">      
                @foreach($inks as $data)
                <option value="{{$data->ink_id}}">{{$data->inkName}}</option>
                @endforeach
               </select>
   </div>

</div>


          
        </div>
        <div class="modal-footer">
         <input type="text" class="id" name="finishId" readonly="readonly" style="color: white;border:none;background: none" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button class="btn btn-sm btn-primary waves-effect waves-light  red" type="submit" name="action"><i class="fa fa-save" aria-hidden="true"></i>&nbsp;SAVE</button>
           {!! Form::close() !!}
        </div>
      </div>
      
    </div>
  </div>










        
@endsection