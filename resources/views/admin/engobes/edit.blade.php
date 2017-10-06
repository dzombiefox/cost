@extends('layouts.admin')
@section('content')
<script>
function edit(id,value){
  $('#modalEdit').modal('show'); 
  $(".dengobeId").val(id);
  $(".volume").val(value);
}
        function remove(id)
    {
       $.ajax({
        url: '{{ url('/admin/dengobes') }}' + '/' + id,
        type:"DELETE",
        data: {_method: 'delete', _token :$('meta[name="csrf-token"]').attr('content')},
        success:function(data){
         $(".table > tbody").html("");
                                            for (i in data)
                                   {
                                    var future_field = data[i];
                                     $('.table').append('<tr><td>'+future_field.itemCode+'</td><td>'+future_field.dvolume+'</td><td>'+"<a href='#' class='btn-floating btn-sm waves-effect waves-light red' onclick='remove("+future_field.dengobe_id+")'><i class='fa fa-trash-o'></i></a>&nbsp;&nbsp;<a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick='edit("+future_field.dengobe_id+","+future_field.dvolume+")'> <i class='fa fa-edit'></i></a>"+'</td></tr>');   
                                    }
                                                           
   
        }
    });
    }
$(document).ready(function(){
     var formDetail=$(".form-detail");
  formDetail.submit(function(e){
     var id=$(".dengobeId").val();
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
                                           $('.table').append('<tr><td>'+future_field.itemCode+'</td><td>'+future_field.dvolume+'</td><td>'+"<a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick='remove("+future_field.dengobe_id+")'><i class='fa fa-trash-o'></i></a>&nbsp;&nbsp;<a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick='edit("+future_field.dengobe_id+","+future_field.dvolume+")'> <i class='fa fa-edit'></i></a>"+'</td></tr>');                                       
                                          }
                                          $('#modalEdit').modal('hide'); 
                                             
         }

      });
  e.preventDefault();
});
$(".item").select2();
$(".color").select2();
$(".size").select2();
$(".water").select2();
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
                                    for (i in data)
                                    {
                                    var future_field = data[i];                                       
                                    }
                                    $('.table').append('<tr><td>'+future_field.itemCode+'</td><td>'+future_field.dvolume+'</td><td>'+"<a href='#' class='btn-floating btn-sm waves-effect waves-light red' onclick='remove("+future_field.dengobe_id+")'><i class='fa fa-trash-o'></i></a>&nbsp;&nbsp;<a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick='edit("+future_field.dengobe_id+","+future_field.dvolume+")'> <i class='fa fa-edit'></i></a>"+'</td></tr>');                           
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
        <li><a href="{{url('admin/engobes')}}">Engobes</a></li>
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
              <h3 class="box-title">Master Engobe</h3>
            </div>
<div class="box-body">
@if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($engobe, [
                            'method' => 'PATCH',
                            'url' => ['/admin/engobes', $engobe->engobe_id],
                            'class' => 'form-horizontal',
                            'files' => true,
                            'id'=> 'form-save'
                        ]) !!}


                        <br>
<div class="form-group">
   <label class="control-label col-sm-2">Engobe name</label>
   <div class="col-md-3">
    {!! Form::text('engobeName', null, ['class' => 'form-control engobeName']) !!}
   </div> 
  
   <label class="control-label col-sm-1">Size</label>
    <div class="col-md-2">
      <select name="sizeId" class="size form-control" style="width: 100%;" >      
          @foreach($size as $data)
        <option value="{{ $data->size_id }}"   @if($data->size_id==$engobe->sizeId) selected='selected' @endif >{{ $data->size }}</option>
          @endforeach
      </select>
   </div>
     <label class="control-label col-sm-1">color</label>
         <div class="col-md-2">
      <select name="colorId" class="color form-control" >      
      @foreach($color as $data)
    <option value="{{ $data->color_id }}"   @if($data->color_id==$engobe->colorId) selected='selected' @endif >{{ $data->colorName }}</option>
      @endforeach
            </select>
   </div>

</div>
<div class="form-group">
<label class="control-label col-sm-2">Water</label>  
<div class="col-md-3">
   <input type="hidden" name="dengobeId" value="{{$detail->dengobe_id}}" />
              <select name="ro" class="water form-control" >      
      @foreach($ro as $data)
       <option value="{{ $data->item_id }}"   @if($data->item_id==$detail->itemId) selected='selected' @endif >{{ $data->itemDesc }}</option>
      @endforeach
            </select>
</div>
<label class="control-label col-sm-1">Volume</label>
<div class="col-md-2">
 <input type="text" name="vol" value="{{$detail->dvolume}}"  class="form-control" />
</div>
<label class="control-label col-sm-1">&nbsp;</label>
<div class="col-md-2">
   <a href="{{ url('admin/engobes') }}" title="Back" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a> 
        <button class="btn btn-sm btn-primary waves-effect waves-light red " type="submit" name="action" id="save">
   <i class="fa fa-save" aria-hidden="true"></i>&nbsp;UPDATE
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
                            <th><a href="#"  data-toggle="modal" data-target="#modal1" class="btn btn-success btn-xs pull-right"> <i class="fa fa-plus" aria-hidden="true"></i></a> </th>
                            </thead>
                            <tbody>
                                @foreach($dengobe as $data)
                                <tr>
                                <td>{{$data->itemCode}}</td>
                                <td>{{$data->dvolume}}</td>
                                <td><a href='#' class='btn-floating btn-sm waves-effect waves-light red' onclick="remove('{{$data->dengobe_id}}')"><i class='fa fa-trash-o'></i></a>
                                  &nbsp;&nbsp;
<a href="#" class="btn-floating btn-xl waves-effect waves-light red" onclick="edit('{{$data->dengobe_id}}','{{$data->dvolume}}')"> <i class='fa fa-edit'></i></a>
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
          {!! Form::open(['url' => '/admin/dengobes', 'class' => 'form-horizontal','id'=>'form-detail', 'files' => true]) !!}
  <input type="hidden" class="id" name="engobeId" value="{{$engobe->engobe_id}}"/>
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


           {!! Form::open(['url' => '/admin/dengobes', 'class' => 'form-horizontal form-detail','id'=>'form-detail','method' =>'PATCH', 'files' => true]) !!}
  <input type="hidden" class="dengobeId" name="dengobeId"/>
  <div class="form-group">
   <label class="control-label col-sm-1">Volume</label>
 <div class="col-md-12">
    {!! Form::text('dvolume', null, ['class' => 'form-control volume']) !!}
          
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