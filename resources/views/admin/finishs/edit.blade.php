@extends('layouts.admin')

@section('content')
<script type="text/javascript">
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
                                     $('.tableInk').append('<tr><td>'+future_field.inkName+'</td><td>'+future_field.size+'</td><td>'+future_field.colorName+'</td><td style="width: 15%" >'+"<a href='#' class='right btn-floating btn-sm waves-effect waves-light red' onclick='removeInk("+future_field.fink_id+")'>delete</a>"+'</td></tr>');      
                    }
                         }
    });
    }

    function removeRoller(id){
               $.ajax({
        url: '{{ url('/admin/frollers') }}' + '/' + id,
        type:"DELETE",
        data: {_method: 'delete', _token :$('meta[name="csrf-token"]').attr('content')},
        success:function(data){          
         $(".tableRoller > tbody").html("");
                for (i in data)
                    {
                       var future_field = data[i];
                                     $('.tableRoller').append('<tr><td>'+future_field.rollerCode+'</td><td>'+future_field.rollerName+'</td><td>'+future_field.lifeTime+'</td><td>'+future_field.price+'</td><td>'+future_field.printing+'</td><td style="width: 15%">'+"<a href='#' class='right btn-floating btn-sm waves-effect waves-light red' onclick='removeRoller("+future_field.froller_id+")'>delete</a>"+'</td></tr>');   
                    }
                              }
    });
    }
    function removePasta(id){

         $.ajax({
        url: '{{ url('/admin/fpastas') }}' + '/' + id,
        type:"DELETE",
        data: {_method: 'delete', _token :$('meta[name="csrf-token"]').attr('content')},
        success:function(data){
          
         $(".tablePasta > tbody").html("");
                for (i in data)
                    {
                    var future_field = data[i];
                    $('.tablePasta').append('<tr><td>'+future_field.pastaName+'</td><td>'+future_field.size+'</td><td>'+future_field.colorName+'</td><td  style="width:15%">'+"<a href='#' class='right btn-floating btn-sm waves-effect waves-light red' onclick='removePasta("+future_field.fpasta_id+")'><i class='material-icons'>delete</i></a>"+'</td></tr>');   
                    }
                              }
    });
    }
    $(document).ready(function(){
        var frm=$(".form-save");
        frm.submit(function(e){
            $.ajax({
                url:frm.attr('action'),
                type:frm.attr('method'),
                data:frm.serialize(),
                success:function(){
                    alert("DATA UPDATE !!");
                }

            });
            e.preventDefault();
        });
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
          $(".item").select2();
          $(".line").select2();
          var formPasta = $('#form-pasta');
          var formInk=$(".form-ink");
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
                                     $('.tableInk').append('<tr><td>'+future_field.inkName+'</td><td>'+future_field.size+'</td><td>'+future_field.colorName+'</td><td style="width: 15%" >'+"<a href='#' class='right btn-floating btn-sm waves-effect waves-light red' onclick='removeInk("+future_field.fink_id+")'>delete</a>"+'</td></tr>');                                  
                                    }
                                                              
                                     }
                                });
                e.preventDefault();
           });
          var formRoller=$("#form-roller");
          formRoller.submit(function(e){
            $.ajax({
                type:formRoller.attr('method'),
                url:formRoller.attr('action'),
                data:formRoller.serialize(),
                success:function(data){
                        $(".tableRoller > tbody").html("");
                                    for (i in data)
                                    {
                                    var future_field = data[i];
                                     $('.tableRoller').append('<tr><td>'+future_field.rollerCode+'</td><td>'+future_field.rollerName+'</td><td>'+future_field.lifeTime+'</td><td>'+future_field.price+'</td><td>'+future_field.printing+'</td><td style="width: 15%">'+"<a href='#' class='right btn-floating btn-sm waves-effect waves-light red' onclick='removeRoller("+future_field.froller_id+")'>delete</a>"+'</td></tr>');                                       
                                    }

                }
            });
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
                                     $('.tablePasta').append('<tr><td>'+future_field.pastaName+'</td><td>'+future_field.size+'</td><td>'+future_field.colorName+'</td><td  style="width:15%">'+"<a href='#' class='right btn-floating btn-sm waves-effect waves-light red' onclick='removePasta("+future_field.fpasta_id+")'><i class='material-icons'>delete</i></a>"+'</td></tr>');                                      
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
              <h3 class="box-title">Master Finish Item</h3>
            </div>
@if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
  {!! Form::model($finish, [
                            'method' => 'PATCH',
                            'url' => ['/admin/finishs', $finish->finish_id],
                            'class' => 'form-horizontal form-save',
                            'files' => true
                        ]) !!}
<br>
<div class="form-group" style="margin-right: 15px">
   <label class="control-label col-sm-1">Motif</label>
   <div class="col-md-5">
<select name="motifId" class="motif" style="width: 100%">      
                @foreach($motifs as $data)
                  <option value="{{ $data->motif_id }}"   @if($data->motif_id==$finish->motifId) selected='selected' @endif >{{ $data->motifName }}</option>
                  @endforeach
          </select>
   </div>
    <label class="control-label col-sm-1">Size</label>
     <div class="col-md-2">
       <select name="sizeId" class="size" style="width: 100%">      
                @foreach($size as $data)
                  <option value="{{ $data->size_id }}"   @if($data->size_id==$finish->sizeId) selected='selected' @endif >{{ $data->size }}</option>
                  @endforeach
            </select>
     </div>
     <label class="control-label col-sm-1">Color</label>
     <div class="col-md-2">
        <select name="colorId" class="color" style="width: 100%">      
                @foreach($color as $data)
                  <option value="{{ $data->color_id }}"   @if($data->color_id==$finish->colorId) selected='selected' @endif >{{ $data->colorName }}</option>
                         @endforeach
            </select>
     </div>
</div>
<div class="form-group" style="margin-right: 15px">
  <label class="control-label col-sm-1">Body</label>
  <div class="col-md-2">
   <select name="bodyId" class="body" style="width: 100%">  
             @foreach($bodys as $data)
               <option value="{{ $data->body_id }}"   @if($data->body_id==$finish->bodyId) selected='selected' @endif >{{$data->bodyName}}&nbsp;{{$data->size}}</option>
                @endforeach
           </select>
</div>
  <label class="control-label col-sm-1">Alumina</label>
  <div class="col-md-2">
  <select name="aluminaId" class="alumina" style="width: 100%">  
             @foreach($aluminas as $data)
             <option value="{{ $data->alumina_id }}"   @if($data->alumina_id==$finish->aluminaId) selected='selected' @endif >{{$data->aluminaName}}</option>
            
             @endforeach
           </select>
</div>
 <label class="control-label col-sm-1">Engobe</label>
  <div class="col-md-2">
  <select name="engobeId" class="engobe" style="width: 100%">  
             @foreach($engobes as $data)
              <option value="{{ $data->engobe_id }}"   @if($data->engobe_id==$finish->engobeId) selected='selected' @endif >{{$data->engobeName}}</option>
             @endforeach
           </select>
</div>
 <label class="control-label col-sm-1">Glaze</label>
  <div class="col-md-2">
  <select name="glazeId" class="glaze" style="width: 100%">  
             @foreach($glazes as $data)
                <option value="{{ $data->glaze_id }}"   @if($data->glaze_id==$finish->glazeId) selected='selected' @endif >{{$data->glazeName}}</option>
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
               <option value="{{ $data->drop_id }}"   @if($data->drop_id==$finish->dropId) selected='selected' @endif >{{$data->dropName}}</option>
             @endforeach
           </select>
  </div>

   <label class="control-label col-sm-1">Option</label>
  <div class="col-md-2">
 {!! Form::select('opt', ['Choose','White', 'Pasta', 'Digital Printing'], null, ['class' => 'form-control opt','id'=>'op','disabled']) !!}
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
                <option value="{{ $data->periode_id }}"   @if($data->periode_id==$finish->periodeId) selected='selected' @endif >{{$data->periodeName}}</option>
              @endforeach
           </select>
   </div>
</div>

<div class="form-group" style="margin-right: 15px">
  <label class="control-label col-sm-1">Line</label>
  <div class="col-md-2">
    <select name="lineId" class="line" style="width: 100%">  
              @foreach($lines as $data)
              <option value="{{ $data->line_id }}"   @if($data->line_id==$finish->lineId) selected='selected' @endif >{{$data->lineName}}</option>
              @endforeach
           </select>
           </div>
  <label class="control-label col-sm-7">&nbsp</label>
  <div class="col-md-2">
    <a href="{{ url('admin/finishs') }}" title="Back" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a> 
        <button class="btn btn-sm btn-primary waves-effect waves-light red " type="submit" name="action" id="save">
   <i class="fa fa-save" aria-hidden="true"></i>&nbsp;SAVE
        </button>        
                                           
  </div>
</div>
                        

                        {!! Form::close() !!}
    <div class="row">
        
         <!-- Custom Tabs -->
        <div class="col-md-12">
          <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#pasta" data-toggle="tab">Pasta</a></li>
              <li><a href="#roller" data-toggle="tab">Roller</a></li>
              <li><a href="#ink" data-toggle="tab">Ink</a></li>
          
              <li class="pull-left header"><i class="fa fa-th"></i> Extra material </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="pasta">
              <div class="box-body">
<table class="table table-bordered table-hover tablePasta"  >
                      
                                <thead>
                                    <tr>
                                       
                                        <th> PastaName </th>
                                        <th> Size </th>
                                        <th> Color</th>
                                        <th>
                                        @if($finish->opt!=3 && $finish->opt!=1)        
                                        <a href="#"  data-toggle="modal" data-target="#mpasta" class="pull-right" ><button class="btn btn-success btn-sm bpasta" data-toggle="modal" data-target="#detailBarang"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Pasta</button></a>
                                        @endif
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pasta as $item)
                                    <tr>
                                       
                                        <td>{{ $item->pastaName }}</td>
                                        <td>{{ $item->size }}</td>
                                        <td>{{ $item->colorName }}</td>
                                        <td style="width: 15%">
                                        <a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick="removePasta('{{$item->fpasta_id}}')">delete</a>
                                             
                                        </td>
                                    </tr>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                           
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="roller">
              <div class="box-body">
                <table class="one responsive-table highlight table nowrap dataTable dtr-inline bordered tableRoller" >
                   
                                <thead>
                                    <tr>
                                        
                                        <th> RollerCode </th>
                                        <th> RollerName </th>
                                        <th> Life Time </th>
                                        <th> Price </th>
                                        <th> Price / Printing </th>
                                        <th> @if($finish->opt!=3 && $finish->opt!=1)        
                                        <a href="#"  data-toggle="modal" data-target="#mroller" class="pull-right" ><button class="btn btn-success btn-sm bpasta" data-toggle="modal" data-target="#detailBarang"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Roller</button></a>
                                        @endif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($roller as $item)
                                    <tr>
                                        
                                        <td>{{ $item->rollerCode }}</td>
                                        <td>{{ $item->rollerName }}</td>
                                        <td>
                                                {{ $item->lifeTime}}
                                            </td>
                                            <td>
                                                {{ $item->price}}
                                            </td>
                                            <td>
                                                {{ $item->printing}}
                                            </td>
                                        <td style="width: 15%">
                                       <a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick="removeRoller('{{$item->froller_id}}')">delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            
                        </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="ink">
                 <div class="box-body">
<table class="table table-bordered table-hover tableInk" >
                           
                                <thead>
                                    <tr>
                                        
                                        <th> InkName </th>
                                        <th> SizeId </th>
                                        <th> ColorId </th>
                                        <th>@if($finish->opt==3)        
                                        <a href="#"  data-toggle="modal" data-target="#mink" class="pull-right" ><button class="btn btn-success btn-sm bpasta" data-toggle="modal" ><i class="fa fa-plus" aria-hidden="true"></i> Tambah Ink</button></a>
                                        @endif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($ink as $item)
                                    <tr>
                                        
                                        <td>{{ $item->inkName }}</td>
                                        <td>{{ $item->size }}</td>
                                        <td>{{ $item->colorName }}</td>
                                        <td style="width: 15%">
                                         <a href='#' class='btn-floating btn-xl waves-effect waves-light red' onclick="removeInk('{{$item->fink_id}}')">delete</a>
                                           
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                         
                    </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
          <!-- nav-tabs-custom -->
        </div>
                        </div>

                    </div>
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
 <input type="hidden" class="id" name="finishId" value="{{$finish->finish_id}}" />

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
 <input type="hidden" class="id" name="finishId" value="{{$finish->finish_id}}" />

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
      {!! Form::open(['url' => '/admin/finks', 'class' => 'form-horizontal form-ink','id'=>'form-ink', 'files' => true]) !!}
 <input type="hidden" class="id" name="finishId" value="{{$finish->finish_id}}"/>

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
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button class="btn btn-sm btn-primary waves-effect waves-light  red" type="submit" name="action"><i class="fa fa-save" aria-hidden="true"></i>&nbsp;SAVE</button>
           {!! Form::close() !!}
        </div>
      </div>
      
    </div>
  </div>
@endsection