@extends('layouts.admin')
@section('content')
<script>
function edit(id,value){

  $('#modalEdit').modal('show'); 
  $(".daluminaId").val(id);
  $(".volume").val(value);
}
        function remove(id)
    {      
     
       $.ajax({
        url: '{{ url('/admin/daluminas') }}' + '/' + id,
        type:"DELETE",
        data: {_method: 'delete', _token :$('meta[name="csrf-token"]').attr('content')},
        success:function(data){
         $(".table > tbody").html("");
                                            for (i in data)
                                   {
                                    var future_field = data[i];
                                     $('.table').append('<tr><td>'+future_field.itemCode+'</td><td>'+future_field.dvolume+'</td><td>'+"<a href='#' class='btn-floating btn-sm waves-effect waves-light red' onclick='remove("+future_field.dalumina_id+")'><i class='fa fa-trash-o'></i></a>&nbsp;&nbsp;<a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick='edit("+future_field.dalumina_id+","+future_field.dvolume+")'> <i class='fa fa-edit'></i></a>"+'</td></tr>');   
                                   }
                                                           
   
        }
    });
    }
function openNew(){
  $("#aluminaName").focus();
   $(".table > tbody").html("");
    $("#weightPcs").val("");
    $("#aluminaName").val("");
    $('.dropdown-toggle').prop('disabled', true);
    $("#aluminaName").removeAttr("disabled");
    $(".size").removeAttr("disabled");
    $("#weightPcs").removeAttr("disabled");
    $("#save").removeAttr("disabled");

}
 function disable(){
    // $('.dropdown-toggle').prop('disabled', true);
    $("#aluminaName").attr("disabled","disabled");
    $(".size").attr("disabled","disabled");
    $("#weightPcs").attr("disabled","disabled");
    $("#save").attr("disabled","disabled");
    
 }   
$(document).ready(function(){
  var formDetail=$(".form-detail");
  formDetail.submit(function(e){
     var id=$(".daluminaId").val();
     var action=formDetail.attr('action')+"/"+id;
         $.ajax({
         type:formDetail.attr('method'),
         url:action,
         data:formDetail.serialize(),
         success:function(data){
            $(".table > tbody").html("");
            for (i in data)
                                          {
                                          var future_field = data[i];  
                                           $('.table').append('<tr><td>'+future_field.itemCode+'</td><td>'+future_field.dvolume+'</td><td>'+"<a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick='remove("+future_field.dalumina_id+")'><i class='fa fa-trash-o'></i></a>&nbsp;&nbsp;<a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick='edit("+future_field.dalumina_id+","+future_field.dvolume+")'> <i class='fa fa-edit'></i></a>"+'</td></tr>');                                       
                                          }
                                          $('#modalEdit').modal('hide'); 
                                             
         }

      });
  e.preventDefault();
});
   $('.dropdown-toggle').prop('disabled', true);
    disable();
    $(".item").select2();
    $(".size").select2();
    var frm = $('#form-save');
    var detail = $('#form-detail');
    var frmall = $('#form-all');
     frm.submit(function(e) {
      var name=$("#aluminaName").val();
      var weight=$("#weightPcs").val();
          if(name==""){
               alert("alumina name can't empty");
               $("#bodyName").focus();
                    }
          else if(weight==""){
                alert("weight Pcs can't empty");
                $("#weightPcs").focus();
                 }
             else{            

              $.ajax({
                                    type: frm.attr('method'),
                                    url: frm.attr('action'),
                                    data: frm.serialize(),
                                    success: function (data) {
                                     $(".id").val(data); 
//                                     $("#addDetail").removeAttr("disabled");
//                                     $("#save").attr("disabled","disabled");
                                      $('.dropdown-toggle').prop('disabled', false);
                                      disable();
                                       $('.dropdown-toggle').prop('disabled', false);
                                    }  
                                });
          }
                e.preventDefault();
           }); 
     detail.submit(function(e) { 
        
                             $.ajax({
                                    type: detail.attr('method'),
                                    url: detail.attr('action'),
                                    data: detail.serialize(),
                                    success: function (data) {
                                      $(".table > tbody").html("");
                                    for (i in data)
                                    {
                                    var future_field = data[i];     
                                    $('.table').append('<tr><td>'+future_field.itemCode+'</td><td>'+future_field.dvolume+'</td><td>'+"<a href='#' class='btn-floating btn-sm waves-effect waves-light red' onclick='remove("+future_field.dalumina_id+")'><i class='fa fa-trash-o'></i></a>&nbsp;&nbsp;<a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick='edit("+future_field.dalumina_id+","+future_field.dvolume+")'> <i class='fa fa-edit'></i></a>"+'</td></tr>');                                   
                                    }
                                                              
    }
                                });
                e.preventDefault();
           });    
     frmall.submit(function(e) {
                 $.ajax({
                type: frmall.attr('method'),
                url: frmall.attr('action'),
                data: frmall.serialize(),
                success: function (data) {   
                $(".table > tbody").html("");                  
                for (i in data)
                     {
                        var future_field = data[i];
                        $('.table').append('<tr><td>'+future_field.itemCode+'</td><td>'+future_field.dvolume+'</td><td>'+"<a href='#' class='btn-floating btn-sm waves-effect waves-light red' onclick='remove("+future_field.dalumina_id+")'><i class='fa fa-trash-o'></i></a>&nbsp;&nbsp;<a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick='edit("+future_field.dalumina_id+","+future_field.dvolume+")'> <i class='fa fa-edit'></i></a>"+'</td></tr>');   
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
        <li><a href="{{url('admin/aluminas')}}">Aluminas</a></li>
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
              <h3 class="box-title">Master Alumina</h3>
            </div>


                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/aluminas', 'class' => 'form-horizontal','id' => 'form-save', 'files' => true]) !!}

<div class="box-body">  
      <div class="form-group">
      <label class="control-label col-md-2">Alumina Name</label>
        <div class="col-md-10">
           {!! Form::text('aluminaName', null, ['class' => 'form-control','id'=>'aluminaName']) !!}
        </div>  
        </div>
        <div class="form-group">
      <label class="control-label col-md-2">Size</label>
       <div class="col-md-10">
                    <select name="sizeId" class="size form-control">      
      @foreach($size as $data)
      <option value="{{$data->size_id}}">{{$data->size}}</option>
      @endforeach
            </select>
       </div>
       </div>
       <div class="form-group">
         <label class="control-label col-md-2">Weight Pcs</label>
       <div class="col-md-7">
                    {!! Form::text('weightPcs', null, ['class' => 'form-control','id'=>'weightPcs']) !!}
       </div>
         <div class="col-md-3 ">
                            
        <a href="{{ url('admin/aluminas') }}" title="Back" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a> 
        <button class="btn btn-sm btn-primary waves-effect waves-light red " type="submit" name="action" id="save">
   <i class="fa fa-save" aria-hidden="true"></i>&nbsp;SAVE
        </button>        
                                            <a class="btn btn-sm btn-danger waves-effect waves-light  " onclick="openNew()">    <!-- <i class="material-icons">mode_edit</i> --><i class="fa fa-plus" aria-hidden="true"></i></a>
  
      </div>
      </div>

                 

                        </div>

                        {!! Form::close() !!}

    <div class="box box-primary">
       
           <div class="box-body">
                     <div class="btn-group pull-right">
                  <button type="button" class="btn btn-success"> <i class="fa fa-edit" aria-hidden="true"></i>&nbsp;OPTION </button>
                  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#"  data-toggle="modal" data-target="#modal1">ADD ONE</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#modal2">FROM OTHER </a></li>
                  
                  </ul>
                </div>
            <br>
            <br>
                  
                        <table class=" table dataTable  table-bordered" >
                            <thead>
                            <th style="width: 60%">ITEM CODE</th>
                            <th style="width: 30%">VOLUME</th>
                            <th>ACTION</th>
                            </thead>
                            <tbody>
                            <td></td>
                            <td></td>
                            <td></td>
                            </tbody>
                        </table>

                    
           

                 
              
              </div>
            <!-- /.box-body -->
          </div>




</div>
                    </div>
            </div>
            </div>
            </section>





 <!-- Modal Structure -->
  <div class="modal fade" id="modal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
           {!! Form::open(['url' => '/admin/daluminas', 'class' => 'form-horizontal','id'=>'form-detail', 'files' => true]) !!}
           <div class="form-group">
   <label class="control-label col-sm-1">Item</label>
   <div class="col-md-12">
   <select name="itemId" class="item" style="width: 100%">      
      @foreach($item as $data)
      <option value="{{$data->item_id}}">{{$data->itemName}}</option>
      @endforeach
    </select>
   </div>

</div>
 <div class="form-group">
   <label class="control-label col-sm-1">Volume</label>
 <div class="col-md-12">
    {!! Form::text('dvolume', null, ['class' => 'form-control sel','autocomplete'=>'off']) !!}
          
 </div>

 </div>
  

          
        </div>
        <div class="modal-footer">
        <input type="text" class="id readonly" name="aluminaId" readonly="readonly"  />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button class="btn btn-sm btn-primary waves-effect waves-light  red" type="submit" name="action"><i class="fa fa-save" aria-hidden="true"></i>&nbsp;SAVE</button>

           {!! Form::close() !!}
        </div>
      </div>
      
    </div>
  </div>





             <!-- Modal Structure -->
     
             

<!-- Modal Modal2 -->
  <div class="modal fade" id="modal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
        {!! Form::open(['url' => '/aluminas/all', 'class' => 'form-horizontal','id'=>'form-all', 'files' => true]) !!}

           <div class="form-group">
   <label class="control-label col-sm-1">Alumina</label>
   <div class="col-md-12">
     <select name="daluminaId" class="item" style="width: 100%">      
            @foreach($alumina as $data)
            <option value="{{$data->alumina_id}}">{{$data->aluminaName}}</option>
            @endforeach
       </select>
   </div>

</div>


          
        </div>
        <div class="modal-footer">
        <input type="text" class="id readonly" name="aluminaId" readonly="readonly" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button class="btn btn-sm btn-primary waves-effect waves-light  red" type="submit" name="action"><i class="fa fa-save" aria-hidden="true"></i>&nbsp;SAVE</button>
           {!! Form::close() !!}
        </div>
      </div>
      
    </div>
  </div>


   
<!-- Edit Modal Structure -->
  <div class="modal fade" id="modalEdit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">


           {!! Form::open(['url' => '/admin/daluminas', 'class' => 'form-horizontal form-detail','id'=>'form-detail','method' =>'PATCH', 'files' => true]) !!}
  <input type="hidden" class="daluminaId" name="daluminaId"/>
 
 <div class="form-group">
   <label class="control-label col-sm-1">Volume</label>
 <div class="col-md-12">
    {!! Form::text('dvolume', null, ['class' => 'form-control volume','autocomplete'=>'off']) !!}
          
 </div>

 </div>

          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button class="btn btn-sm btn-primary waves-effect waves-light  red" type="submit" name="action"><i class="fa fa-save" aria-hidden="true"></i>&nbsp;SAVE</button>
           {!! Form::close() !!}
        </div>
      </div>
      
    </div>
  </div>
 
  </div>
  </div>
  </div>   
@endsection