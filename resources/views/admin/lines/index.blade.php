@extends('layouts.admin')

@section('content')
<section class="content-header">
    <h1>&nbsp;</h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Lines</a></li>
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
                                        <th>No</th>
                                        <th> LineName </th>
                                       
                                        <th><a href="{{ url('/admin/lines/create') }}" title="Back" class="pull-right"><button class="btn btn-warning btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Lines</button></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($lines as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->lineName }}</td>
                                        <td style="width: 15%">
                                         <a href="{{ url('/admin/lines/' . $item->line_id) }}"  class="btn btn-success fa fa-eye"></a>
                                           <a href="{{ url('/admin/lines/' . $item->line_id . '/edit') }}" class="btn btn-primary fa fa-edit" ></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/lines', $item->line_id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger  btn fa-remove fa',
                                                        'title' => 'Delete Line',
                                                        'onclick'=>'return confirm("Confirm delete?")',
                                                        
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        
                        </div>

                    </div>
                </div>
            </div>
   </section>
@endsection