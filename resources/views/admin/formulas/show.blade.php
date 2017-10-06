@extends('layouts.admin')

@section('content')
   <section class="content-header">
      <h1>
       View Brands      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Formulas</a></li>
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
         
 
                              <a href="{{ url('/admin/formulas') }}" title="Back" class="pull-right"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                       <a href="{{ url('/admin/formulas/' . $formula->formula_id . '/edit') }}" class="btn btn-primary fa fa-edit" data-position="right" ></a>

                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/formulas', $formula->formula_id],
                            'style' => 'display:inline'
                        ]) !!}
                             {!! Form::button('', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger  btn fa-remove fa',
                                                        'title' => 'Delete Formula',
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
                                        <th style="width: 20%">ID</th><td>{{ $formula->formula_id }}</td>
                                    </tr>
                                    <tr><th> Data </th><td> {{ $formula->name }} </td>
                                    </tr><tr><th> Size </th><td> {{ $formula->size }} </td>
                                    </tr><tr><th> Status </th><td> {{ $formula->statusName }} </td></tr>
                                    <tr><th> Volume </th><td> {{ $formula->value }} </td></tr>
                                </tbody>
                            </table>
                             
                        </div>

                    </div>
                </div>
            </div>
            </div>
            </section>
   
@endsection