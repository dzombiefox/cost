@extends('layouts.admin')

@section('content')
<script type="text/javascript">
    function copy(id){
       $(".id").val(id);
  $('#modalCopy').modal('show'); 
}

$(document).ready(function(){
        $(".motif").select2();
        $(".size").select2();
        $(".color").select2();

});
</script>
<section class="content-header">
    <h1>&nbsp;</h1>
   
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Prices</a></li>
        <li class="active">Data</li>
      </ol>
    </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
                    <!-- /.box -->

          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
                  <table class="one responsive-table highlight table nowrap dataTable dtr-inline bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th> Motif </th>
                                        <th> Size </th>
                                        <th> Color </th>
                                        <th>Periode</th>
                                        <th>Sell KW1</th>
                                        <th>Sell KW2</th>
                                        <th>Sell KW3</th>
                                        <th>Sell KW4</th>
                                        <th>Sell KW5</th>
                                      
                                        <th><a href="{{ url('/admin/prices/create') }}" title="Back" class="pull-right"><button class="btn btn-warning btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Prices</button></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($prices as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->motifName }}</td>
                                        <td>{{ $item->size }}</td>
                                        <td>{{ $item->colorName }}</td>
                                        <td>{{ $item->periodeName."&nbsp;".$item->year}}</td>
                                        <td>{{ number_format($item->skw_1,2)}}</td>
                                        <td>{{ number_format($item->skw_2,2)}}</td>
                                        <td>{{ number_format($item->skw_3,2)}}</td>
                                        <td>{{ number_format($item->skw_4,2)}}</td>
                                        <td>{{ number_format($item->skw_5,2)}}</td>
                                  
                                          <td style="width: 15%">
                                            <a href="{{ url('/admin/prices/' . $item->price_id) }}"  class="btn btn-success fa fa-eye"></a>
                                            <a href="{{ url('/admin/prices/' . $item->price_id . '/edit') }}" class="btn btn-primary fa fa-edit" ></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/prices', $item->price_id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger  btn fa-remove fa',
                                                        'title' => 'Delete Data',
                                                        'onclick'=>'return confirm("Confirm delete?")',
                                                        
                                                )) !!}
                                            {!! Form::close() !!}
                                               <a class="btn  btn-success fa fa-copy" onclick="copy('{{$item->price_id}}')"></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                          
                        </div>

                    </div>
                </div>
            </div>
                        <!-- Edit Modal Structure -->
  <div class="modal fade" id="modalCopy" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
           {!! Form::open(['url' => '/copy', 'class' => 'form-horizontal form-detail','id'=>'form-detail','method' =>'POST', 'files' => true]) !!}
  <input type="hidden" class="id" name="price_id"/>
 
 <div class="form-group">
   <label class="control-label col-sm-1">Motif</label>
 <div class="col-md-12">
    <select name="motifId" class="form-control motif" style="width: 100%">
             @foreach($motifs as $data)
         <option value="{{$data->motif_id}}">{{$data->motifName}}</option>
         @endforeach
</select>
          
 </div>

 </div>
  <div class="form-group">
   <label class="control-label col-sm-1">Size</label>
 <div class="col-md-12">
    <select name="sizeId" class="form-control size" style="width: 100%">
          @foreach($sizes as $data)
         <option value="{{$data->size_id}}">{{$data->size}}</option>
         @endforeach
       </select>
</select>
          
 </div>

 </div>
  <div class="form-group">
   <label class="control-label col-sm-1">Color</label>
 <div class="col-md-12">
     <select name="colorId" class="form-control color" style="width: 100%">
          @foreach($colors as $data)
         <option value="{{$data->color_id}}">{{$data->colorName}}</option>
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
        </section>
@endsection