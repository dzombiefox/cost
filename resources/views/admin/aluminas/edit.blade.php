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

    $(".size").select2();
    $(".item").select2();
          var frm = $('#form-save');
          var detail = $('#form-detail');
                  frm.submit(function(e) {                   
                           $.ajax({
                                    type: frm.attr('method'),
                                    url: frm.attr('action'),
                                    data: frm.serialize(),
                                    success: function (data) {
                                    alert('Data Updated !!');
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
                                    $('.table').append('<tr><td>'+future_field.itemCode+'</td><td>'+future_field.dvolume+'</td><td>'+"<a href='#' class='btn-floating btn-sm waves-effect waves-light red' onclick='remove("+future_field.dalumina_id+")'><i class='fa fa-trash-o'></i></a>&nbsp;&nbsp;<a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick='edit("+future_field.dalumina_id+","+future_field.dvolume+")'> <i class='fa fa-edit'></i></a>"+'</td></tr>');                           
    }
                                });
                e.preventDefault();
           });
           
           
           
              });
   
    </script>
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

                        {!! Form::model($alumina, [
                            'method' => 'PATCH',
                            'url' => ['/admin/aluminas', $alumina->alumina_id],
                            'class' => 'form-horizontal',
                            'files' => true,
                            'id'=>'form-save'
                        ]) !!}
               
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
                    <select name="sizeId" class="size " style="width: 100%">      
      @foreach($size as $data)
    <option value="{{ $data->size_id }}"   @if($data->size_id==$alumina->sizeId) selected='selected' @endif >{{ $data->size }}</option>
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
   <i class="fa fa-save" aria-hidden="true"></i>&nbsp;UPDATE
        </button>        
                                          
  
      </div>
      </div>

                 

                        </div>


                        {!! Form::close() !!}
                
           
            
               <div class="box box-primary">
       
           <div class="box-body">
                
           <table class="tg responsive-table highlight table nowrap dataTable dtr-inline bordered" >
                            <thead>
                            <th style="width: 60%">ITEM CODE</th>
                            <th style="width: 30%">VOLUME</th>
                            <th>  <a href="#"  data-toggle="modal" data-target="#modal1" class="btn btn-success btn-xs pull-right"> <i class="fa fa-plus" aria-hidden="true"></i></a></th>
                            </thead>
                            <tbody>
                                @foreach($dalumina as $data)
                                <tr>
                                <td>{{$data->itemCode}}</td>
                                <td>{{$data->dvolume}}</td>
                                <td><a href='#' class='btn-floating btn-sm waves-effect waves-light red' onclick="remove('{{$data->dalumina_id}}')"><i class='fa fa-trash-o'></i></a>&nbsp;&nbsp;
<a href="#" class="btn-floating btn-xl waves-effect waves-light red" onclick="edit('{{$data->dalumina_id}}','{{$data->dvolume}}')"> <i class='fa fa-edit'></i></a></td>
                                </tr>
                                @endforeach                             
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
  </div>
  </div>
  </section>


<!-- Modal add -->
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
 <input type="hidden" id="id" name="aluminaId" value="{{$alumina->alumina_id}}"/>
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
    {!! Form::text('dvolume', null, ['class' => 'form-control sel']) !!}
          
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
          



          
@endsection