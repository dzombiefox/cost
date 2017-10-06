@extends('layouts.admin')
@section('content')
  <section class="content-header">
      <h1>
       View Sizes      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sizes</a></li>
        <li class="active">View</li>
      </ol>
    </section>
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box-body">                      
         <a href="{{ url('/admin/sizes') }}" title="Back" class="pull-right"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                       <a href="{{ url('/admin/sizes/' . $size->size_id . '/edit') }}" class="btn btn-primary fa fa-edit" data-position="right" ></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/sizes', $size->size_id],
                            'style' => 'display:inline'
                        ]) !!}
                             {!! Form::button('', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger  btn fa-remove fa',
                                                        'title' => 'Delete Size ',
                                                        'onclick'=>'return confirm("Confirm delete?")',
                                                        'data-position'=>'right',
                                                        'data-delay'=>'50',
                                                        'data-tooltip'=>'Remove Data'
                                                )) !!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                    
                            <table class="one table table-borderless">
                                <tbody>
                                    <tr>
                                        <th style="width: 20%">ID</th><td>{{ $size->size_id }}</td>
                                    </tr>
                                    <tr><th> Size </th><td> {{ $size->size }} </td></tr><tr><th> Quantity </th><td> {{ $size->quantity }} </td></tr><tr><th> RefId </th><td> {{ $size->refId }} </td></tr>
                                </tbody>
                            </table>
                       

                    </div>
                </div>
            </div>
        </div>
</section>
@endsection