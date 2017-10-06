@extends('layouts.admin')
    <section class="content-header">
      <h1>
       View Items      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Items</a></li>
        <li class="active">View</li>
      </ol>
    </section>
@section('content')
<section class="content-header">
      <h1>
       View Items      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Items</a></li>
        <li class="active">View</li>
      </ol>
    </section>
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
                    <!-- /.box -->

          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">


                        
         
 
                              <a href="{{ url('/admin/items') }}" title="Back" class="pull-right"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                       <a href="{{ url('/admin/items/' . $item->item_id . '/edit') }}" class="btn btn-primary fa fa-edit" data-position="right" ></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/items', $item->item_id],
                            'style' => 'display:inline'
                        ]) !!}
                                                         {!! Form::button('', array(
                                                       'type' => 'submit',
                                                        'class' => 'btn btn-danger  btn fa-remove fa',
                                                        'title' => 'Delete Item',
                                                        'onclick'=>'return confirm("Confirm delete?")',
                                                        'data-position'=>'right',
                                                        'data-delay'=>'50',
                                                        'data-tooltip'=>'Remove Data'
                                                )) !!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="one table table-borderless">
                                <tbody>
                                    <tr>
                                        <th style="width: 20%">ID</th>
                                        <td>{{ $item->item_id }}</td>
                                    </tr>
                                    <tr><th> ItemCode </th><td> {{ $item->itemCode }} </td></tr><tr><th> ItemName </th><td> {{ $item->itemName }} </td></tr><tr><th> ItemDesc </th><td> {{ $item->itemDesc }} </td></tr>
                                </tbody>
                            </table>
</fieldset>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection