@extends('layouts.admin')
@section('content')
<script>
function edit(id,value){
  $('#modalEdit').modal('show'); 
  $(".dbodyId").val(id);
  $(".vol").val(value);
}

    function remove(id)
    {

       $.ajax({
        url: '{{ url('/admin/dbodys') }}' + '/' + id,
        type:"DELETE",
        data: {_method: 'delete', _token :$('meta[name="csrf-token"]').attr('content')},
        success:function(data){
         $(".table > tbody").html("");
                                            for (i in data)
                                   {
                                    var future_field = data[i];
                                     $('.table').append('<tr><td>'+future_field.itemCode+'</td><td>'+future_field.dvolume+'</td><td>'+"<a href='#' class='btn-floating btn-sm waves-effect waves-light red' onclick='remove("+future_field.dbody_id+")'><i class='fa fa-trash-o'></i></a>&nbsp;&nbsp;<a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick='edit("+future_field.dbody_id+","+future_field.dvolume+")'> <i class='fa fa-edit'></i></a>"+'</td></tr>');   
                                    }
                                                           
   
        }
    });
    }
$(document).ready(function(){
    var formDetail=$(".form-detail");
  formDetail.submit(function(e){
     var id=$(".dbodyId").val();
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
                                           $('.table').append('<tr><td>'+future_field.itemCode+'</td><td>'+future_field.dvolume+'</td><td>'+"<a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick='remove("+future_field.dbody_id+")'><i class='fa fa-trash-o'></i></a>&nbsp;&nbsp;<a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick='edit("+future_field.dbody_id+","+future_field.dvolume+")'> <i class='fa fa-edit'></i></a>"+'</td></tr>');                                       
                                          }
                                          $('#modalEdit').modal('hide'); 
                                             
         }

      });
  e.preventDefault();
});
 $('.dropdown-toggle').prop('disabled', true);
$('.item').select2();
   // $(".bodys").select2();
    $("#bodyName").attr('disabled','disabled');
    $("#vol").attr('disabled','disabled');
    $("#addDetail").attr('disabled','disabled');
    $("#new").click(function(){
        $("#addDetail").attr('disabled','disabled');
        $("#save").removeAttr("disabled");
        $("#bodyName").removeAttr("disabled");
        $("#vol").removeAttr("disabled");
        $("#bodyName").focus();
        $("#bodyName").val("");
        $("#vol").val("");
        $(".table > tbody").html("");
        $('.dropdown-toggle').prop('disabled', true);
        
    });
     
        $("#save").attr("disabled","disabled");
        $(".size").select2();
        var frm = $('#form-save');
        var detail = $('#form-detail');
        var frmall = $('#form-all');

          frm.submit(function(e) {
             
                var name=$("#bodyName").val();
                var vol=$("#vol").val();
                    if(name==""){
                        alert("body can't empty");
                         $("#bodyName").focus();
                    }
                    else if(vol==""){
                        alert("volume can't empty");
                         $("#vol").focus();
                    }
                    else{
                        $.ajax({
                                                type: frm.attr('method'),
                                                url: frm.attr('action'),
                                                data: frm.serialize(),
                                                success: function (data) {
                                                 $(".id").val(data); 
                                                 $("#addDetail").removeAttr("disabled");
                                                 $("#save").attr("disabled","disabled");
                                                 $('.dropdown-toggle').prop('disabled',false);
                                                 $("#bodyName").attr('disabled','disabled');
                                                 $("#vol").attr('disabled','disabled');
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
                                     $('.table').append('<tr><td>'+future_field.itemCode+'</td><td>'+future_field.dvolume+'</td><td>'+"<a href='#' class='btn-floating btn-sm waves-effect waves-light red' onclick='remove("+future_field.dbody_id+")'><i class='fa fa-trash-o'></i></a>&nbsp;&nbsp;<a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick='edit("+future_field.dbody_id+","+future_field.dvolume+")'> <i class='fa fa-edit'></i></a>"+'</td></tr>');                                       
                                    }
                                                             
    }
                                });
                e.preventDefault();
           });
                      frmall.submit(function(e) {
                      //alert(frmall.serialize());
                              $.ajax({
                                    type: frmall.attr('method'),
                                    url: frmall.attr('action'),
                                    data: frmall.serialize(),
                                    success: function (data) {
                                       $(".table > tbody").html("");
                             
         for (i in data)
                                    {
                                    var future_field = data[i];
                                     $('.table').append('<tr><td>'+future_field.itemCode+'</td><td>'+future_field.dvolume+'</td><td>'+"<a href='#' class='btn-floating btn-sm waves-effect waves-light red' onclick='remove("+future_field.dbody_id+")'><i class='fa fa-trash-o'></i></a>&nbsp;&nbsp;<a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick='edit("+future_field.dbody_id+","+future_field.dvolume+")'> <i class='fa fa-edit'></i></a>"+'</td></tr>');   
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
        <li><a href="{{url('admin/bodys')}}">Bodys</a></li>
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
              <h3 class="box-title">Master Body</h3>
            </div>
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                  <div class="box-body">  
                       

                    
{!! Form::open(['url' => '/admin/bodys', 'class' => 'form-horizontal','id' => 'form-save', 'files' => true]) !!}
<br>

<div class="form-group">
   <label class="control-label col-sm-1">Bodyname</label>
   <div class="col-md-3">
    {!! Form::text('bodyName', null, ['class' => 'form-control','id'=>'bodyName']) !!}
   </div> 
   <label class="control-label col-sm-1">Choice</label>
   <div class="col-md-3">
    {!! Form::select('choose', ['THIN', 'NORMAL'], null, ['class' => 'form-control choose']) !!}
   </div>
   <label class="control-label col-sm-1">Size</label>
    <div class="col-md-3">
      <select name="sizeId" class="size form-control" style="width: 100%;" >      
          @foreach($size as $data)
          <option value="{{$data->size_id}}">{{$data->size}}</option>
          @endforeach
      </select>
   </div>
</div>     

<div class="form-group">
   <label class="control-label col-sm-1">Water</label>
   <div class="col-md-3">
    <select name="ro" class="size form-control">      
      @foreach($ro as $data)
      <option value="{{$data->item_id}}">{{$data->itemDesc}}</option>
      @endforeach
            </select>
   </div>
<label class="control-label col-sm-1">Volume</label>
 <div class="col-md-3">
    {!! Form::text('vol', null, ['class' => 'form-control','id'=>'vol']) !!}
 </div>

  <div class="col-md-3 pull-right ">
  <a href="{{ url('admin/bodys') }}" title="Back" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a> 
        <button class="btn btn-sm btn-primary waves-effect waves-light red " type="submit" name="action" id="save">
   <i class="fa fa-save" aria-hidden="true"></i>&nbsp;SAVE
        </button>        
                                            <a class="btn btn-sm btn-danger waves-effect waves-light  " id="new">    <!-- <i class="material-icons">mode_edit</i> --><i class="fa fa-plus" aria-hidden="true"></i></a>

                                          
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
           {!! Form::open(['url' => '/admin/dbodys', 'class' => 'form-horizontal','id'=>'form-detail', 'files' => true]) !!}
           <!-- <input type="hidden" class="id" name="bodyId"/> -->
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
          {!! Form::text('bodyId',null,['class'=>'id readonly','readonly'] )!!}

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button class="btn btn-sm btn-primary waves-effect waves-light  red" type="submit" name="action"><i class="fa fa-save" aria-hidden="true"></i>&nbsp;SAVE</button>
           {!! Form::close() !!}
        </div>
      </div>
      
    </div>
  </div>


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
        {!! Form::open(['url' => '/admins/all', 'class' => 'form-horizontal','id'=>'form-all', 'files' => true]) !!}
  
           <div class="form-group">
   <label class="control-label col-sm-1">Body</label>
   <div class="col-md-12">
    <select name="dbodyId" class="item" style="width: 100%">      
      @foreach($body as $data)
      <option value="{{$data->body_id}}">{{$data->bodyName}}</option>
      @endforeach
    </select>
   </div>

</div>


          
        </div>
        <div class="modal-footer">
        <input type="text" class="id readonly" name="bodyId" readonly="readonly"/>
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


           {!! Form::open(['url' => '/admin/dbodys', 'class' => 'form-horizontal form-detail','id'=>'form-detail','method' =>'PATCH', 'files' => true]) !!}
  <input type="hidden" class="dbodyId" name="dbodyId"/>
  
 <div class="form-group">
   <label class="control-label col-sm-1">Volume</label>
 <div class="col-md-12">
    {!! Form::text('dvolume', null, ['class' => 'form-control vol','autocomplete'=>'off']) !!}
          
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

</section>

@endsection
