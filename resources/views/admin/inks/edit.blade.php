@extends('layouts.admin')

@section('content')
<script>
function edit(id,value){
  $('#modalEdit').modal('show'); 
  $(".dinkId").val(id);
  $(".vol").val(value);
}
        function remove(id)
    {
       $.ajax({
        url: '{{ url('/admin/dinks') }}' + '/' + id,
        type:"DELETE",
        data: {_method: 'delete', _token :$('meta[name="csrf-token"]').attr('content')},
        success:function(data){
         $(".table > tbody").html("");
                                  for (i in data)
                                   {
                                    var future_field = data[i];
                                     $('.table').append('<tr><td>'+future_field.itemCode+'</td><td>'+future_field.dvolume+'</td><td>'+"<a href='#' class='btn-floating btn-sm waves-effect waves-light red' onclick='remove("+future_field.dink_id+")'><i class='fa fa-trash-o'></i></a>&nbsp;&nbsp;<a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick='edit("+future_field.dink_id+","+future_field.dvolume+")'> <i class='fa fa-edit'></i></a>"+'</td></tr>'); 
                                    }
                                                           
   
        }
    });
    }
$(document).ready(function(){
   var formDetail=$(".form-detail");
  formDetail.submit(function(e){
     var id=$(".dinkId").val();
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
                                           $('.table').append('<tr><td>'+future_field.itemCode+'</td><td>'+future_field.dvolume+'</td><td>'+"<a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick='remove("+future_field.dink_id+")'><i class='fa fa-trash-o'></i></a>&nbsp;&nbsp;<a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick='edit("+future_field.dink_id+","+future_field.dvolume+")'> <i class='fa fa-edit'></i></a>"+'</td></tr>');                                       
                                          }
                                          $('#modalEdit').modal('hide'); 
                                             
         }

      });
  e.preventDefault();
});
$(".item").select2();
$(".color").select2();
$(".size").select2();
          var frm = $('#form-save');
          var detail = $('#form-detail');
              frm.submit(function(e) {
              $.ajax({
                                    type: frm.attr('method'),
                                    url: frm.attr('action'),
                                    data: frm.serialize(),
                                    success: function (data) {
                                       alert('Data Updated !!');
//                                     $("#id").val(data); 
//                                     $("#addDetail").removeAttr("disabled");
//                                     $("#save").attr("disabled","disabled");
                                    }  
                                });
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
                                      $('.table').append('<tr><td>'+future_field.itemCode+'</td><td>'+future_field.dvolume+'</td><td>'+"<a href='#' class='btn-floating btn-sm waves-effect waves-light red' onclick='remove("+future_field.dink_id+")'><i class='fa fa-trash-o'></i></a>&nbsp;&nbsp;<a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick='edit("+future_field.dink_id+","+future_field.dvolume+")'> <i class='fa fa-edit'></i></a>"+'</td></tr>');                                      
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
        <li><a href="{{url('admin/inks')}}">Inks</a></li>
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
              <h3 class="box-title">Master Ink</h3>
            </div>
<div class="box-body">
 @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($ink, [
                            'method' => 'PATCH',
                            'url' => ['/admin/inks', $ink->ink_id],
                            'class' => 'form-horizontal',
                            'files' => true,
                            'id'=> 'form-save'
                        ]) !!}

                        <div class="form-group">
   <label class="control-label col-sm-2">Ink name</label>
   <div class="col-md-3">
   {!! Form::text('inkName', null, ['class' => 'form-control inkName']) !!}
   </div>
<label class="control-label col-sm-1">Size</label>
  <div class="col-md-2">    
     <select name="sizeId" class="size" style="width: 100%">      
                              @foreach($size as $data)
                              <option value="{{ $data->size_id }}"   @if($data->size_id==$ink->sizeId) selected='selected' @endif >{{ $data->size }}</option>
                              @endforeach
                                    </select>
  </div>
  <label class="control-label col-sm-1">Color</label>
<div class="col-md-2"> 
<select name="colorId" class="size" style="width: 100%">      
                              @foreach($color as $data)
                               <option value="{{ $data->color_id }}"   @if($data->color_id==$ink->colorId) selected='selected' @endif >{{ $data->colorName }}</option>
                              @endforeach
                                    </select>
</div>
</div>

<div class="form-group">
  <label class="form-label col-sm-9">&nbsp</label>
  <div class="col-md-2">
   <a href="{{ url('admin/inks') }}" title="Back" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a> 
        <button class="btn btn-sm btn-primary waves-effect waves-light red " type="submit" name="action" id="save">
   <i class="fa fa-save" aria-hidden="true"></i>&nbsp;SAVE
        </button>        
                                         
</div>

</div>


                          {!! Form::close() !!}

                          <div class="box box-primary">
       
           <div class="box-body">
           <table class="tg responsive-table highlight table nowrap dataTable dtr-inline bordered" >
                            <thead>
                            <th style="width: 60%">ITEM CODE</th>
                            <th style="width: 30%">VOLUME</th>
                            <th><a href="#"  data-toggle="modal" data-target="#modal1" class="btn btn-success btn-xs pull-right"> <i class="fa fa-plus" aria-hidden="true"></i></a></th>
                            </thead>
                            <tbody>
                                @foreach($dink as $data)
                                <tr>
                                <td>{{$data->itemCode}}</td>
                                <td>{{$data->dvolume}}</td>
                                <td>
                                <a href='#' class='btn-floating btn-sm waves-effect waves-light red' onclick="remove('{{$data->dink_id}}')"><i class='fa fa-trash-o'></i></a>
                                  &nbsp;&nbsp;
<a href="#" class="btn-floating btn-xl waves-effect waves-light red" onclick="edit('{{$data->dink_id}}','{{$data->dvolume}}')"> <i class='fa fa-edit'></i>
                                </td>
                                </tr>
                                @endforeach
                                
                                    
                               
                            </tbody>
                        </table>
           </div>
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
         {!! Form::open(['url' => '/admin/dinks', 'class' => 'form-horizontal','id'=>'form-detail', 'files' => true]) !!}
        <input type="hidden" id="id" name="inkId" value="{{$ink->ink_id}}"/>
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
    {!! Form::text('dvolume', null, ['class' => 'form-control sel' ,'autocomplete'=>'off']) !!}
          
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

                       
                  
                   
                   
                
                        {!! Form::close() !!}
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


           {!! Form::open(['url' => '/admin/dinks', 'class' => 'form-horizontal form-detail','id'=>'form-detail','method' =>'PATCH', 'files' => true]) !!}
  <input type="hidden" class="dinkId" name="dinkId"/>
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

@endsection