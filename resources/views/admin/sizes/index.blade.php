@extends('layouts.admin')
@section('content')
 <section class="content-header">
    <h1>&nbsp;</h1>
    <!--  <a href="{{ url('/admin/brands/create') }}" title="Back" class=""><button class="btn btn-warning btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Brand</button></a> -->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sizes</a></li>
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
                                        <th>NO</th><th> Size </th><th> Quantity </th><th> RefId </th>
                                        <th><a href="{{ url('/admin/sizes/create') }}" title="Back" class="pull-right"><button class="btn btn-warning btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Sizes</button></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($sizes as $item)
                                    <tr>
                                        <td style="width: 2%">{{ $loop->iteration }}</td>
                                        <td>{{ $item->size }}</td><td>{{ $item->quantity }}</td><td>{{ $item->refId }}</td>
                                        <td style="width: 15%">
                                        <a href="{{ url('/admin/sizes/' . $item->size_id) }}"  class="btn btn-success fa fa-eye"></a>
                                           <a href="{{ url('/admin/sizes/' . $item->size_id . '/edit') }}" class="btn btn-primary fa fa-edit" ></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/sizes', $item->size_id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger  btn fa-remove fa',
                                                        'title' => 'Delete Size',
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