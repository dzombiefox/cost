@extends('layouts.app')

@section('content')
<script>
    $(document).ready(function(){
        $(".choose").select2();
        $(".size").select2();
        $(".periode").select2();
        $(".item").select2();
         var frm = $('#form-save');
         var detail = $('#form-detail');
          frm.submit(function(e) {
              $.ajax({
                                    type: frm.attr('method'),
                                    url: frm.attr('action'),
                                    data: frm.serialize(),
                                    success: function (data) {
    //{

       // var future_field = data[i];
      //  alert(future_field.body_id)
        // Populate table

    //}
                                      
                                    $("#id").val(data);                              
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
                                    $('.table').append('<tr><td>'+future_field.itemCode+'</td><td>'+future_field.volume+'</td><td>'+"<button class='btn btn-sm btn-primary waves-effect waves-light right red' type='submit' name='action'>REMOVE<i class='material-icons right'>send</i></button>"+'</td></tr>');                           
    }
                                });
                e.preventDefault();
           });
           
           
           
    });

</script>

<div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
                    <div class="mdl-card__media">
   <div class="bread">     
  <nav>
    <div class="nav-wrapper">
      <div class="col s12">
        <a href="#!" class="breadcrumb">Home</a>
        <a href="{{url('/admin/bodys')}}" class="breadcrumb">Data Body</a>
        <a  class="breadcrumb">Create Body</a>
      </div>
    </div>
  </nav>
          </div>
                    </div>
    <div id="striped" class="section scrollspy">
         

<div class="row">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <fieldset>
                            <legend>INPUT DATA BODY</legend>
                       
                        {!! Form::open(['url' => '/admin/bodys', 'class' => 'form-horizontal','id' => 'form-save', 'files' => true]) !!}
                        <div class="row">
                                  <div class="input-field col s12">
           {!! Form::text('bodyName', null, ['class' => 'form-control']) !!}
          <label for="first_name">Bodyname</label>
        </div>  
                        </div>
                      <div class="row">      

        <div class="input-field col s3">
          {!! Form::select('choose', ['THIN', 'NORMAL'], null, ['class' => 'form-control choose']) !!}
    
        </div>
        <div class="input-field col s3">
            <select name="sizeId" class="size">      
      @foreach($size as $data)
      <option value="{{$data->size_id}}">{{$data->size}}</option>
      @endforeach
            </select>
        </div>
        <div class="input-field col s3">
            <select name="periodeId" class="periode">      
      @foreach($periode as $data)
      <option value="{{$data->periode_id}}">{{$data->periodeName}}</option>
      @endforeach
    </select>

        </div>
                                      <div class="right ">
        <button class="btn btn-sm btn-primary waves-effect waves-light red " type="submit" name="action">SAVE
    <i class="material-icons right">done</i>
        </button>        
                                            <a class="btn btn-sm btn-primary waves-effect waves-light  red" href="#modal1"> <i class="material-icons">add</i></a>
                                          
    </div> 
</div>



                        {!! Form::close() !!}
                      
                          </fieldset>

  <!-- Modal Structure -->
  <div id="modal1" class="modal " style="background-color: #FFF">
    <div class="modal-content">
      <h5>Detail Item</h5> 
        {!! Form::open(['url' => '/admin/dbodys', 'class' => 'form-horizontal','id'=>'form-detail', 'files' => true]) !!}
                        <input type="hidden" id="id" name="bodyId"/>
           <div class="input-field col s12">
               <select name="itemId" class="item" style="width: 100%">      
      @foreach($item as $data)
      <option value="{{$data->item_id}}">{{$data->itemName}}</option>
      @endforeach
    </select>
        </div>  
                        <br>
                        <br>
                        <br>
                        
                 <div class="input-field col s12">
           {!! Form::text('volume', null, ['class' => 'form-control sel']) !!}
          <label for="first_name">Volume</label>
        </div>  
                        <br>
                        <br>
                        <br>
                        <br>
    </div>
    <div class="modal-footer">
              <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a> <button class="btn btn-sm btn-primary waves-effect waves-light  red" type="submit" name="action"><i class="material-icons right">done</i>SAVE
    
        </button>
    </div>
       {!! Form::close() !!}
  </div>
          
                          

 

     <div id="striped" class="section scrollspy">        
        <div class="row">
          <div class="col s12">
              <div class="tg-wrap">
                        <table class="tg responsive-table highlight table nowrap dataTable dtr-inline bordered" >
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
                </div>
            </div>
  </div>
   

</div>
    </div>
</div>


@endsection
