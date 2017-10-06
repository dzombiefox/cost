@extends('layouts.admin')
@section('content')
  <section class="content-header">
     <h1>
           <a href="{{ url()->previous() }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>    
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Rollers</a></li>
        <li class="active">View</li>
      </ol>
    </section>
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box-body">                      
         <a href="{{ url('/admin/rollers') }}" title="Back" class="pull-right"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                       <a href="{{ url('/admin/rollers/' . $roller->roller_id . '/edit') }}" class="btn btn-primary fa fa-edit" data-position="right" ></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/rollers', $roller->id],
                            'style' => 'display:inline'
                        ]) !!}
                           {!! Form::button('', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger  btn fa-remove fa',
                                                        'title' => 'Delete Roller ',
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
                                        <th style="width: 20%">ID</th><td>{{ $roller->roller_id }}</td>
                                    </tr>
                                    <tr><th> RollerCode </th><td> {{ $roller->rollerCode }} </td></tr><tr><th> RollerName </th><td> {{ $roller->rollerName }} </td></tr><tr><th> SubCode </th><td> {{ $roller->subCode }} </td></tr>
                                </tbody>
                            </table>


                    </div>
                </div>
            </div>
        </div>
  </section>
@endsection