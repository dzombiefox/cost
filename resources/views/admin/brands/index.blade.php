@extends('layouts.admin')

@section('content')
    <section class="content-header">
    <h1>&nbsp;</h1>
    <!--  <a href="{{ url('/admin/brands/create') }}" title="Back" class=""><button class="btn btn-warning btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Brand</button></a> -->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Brands</a></li>
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

<table class="table table-bordered table-hover" id="example">
                   
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th> BrandName </th>
                                        <th ><a href="{{ url('/admin/brands/create') }}" title="Back" class="pull-right"><button class="btn btn-warning btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Brand</button></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $item)
                                    <tr>
                                        <td style="width: 5%">{{ $loop->iteration }}</td>
                                        <td>{{ $item->brandName }}</td>
                                        <td style="width: 15%">                                        
                                            <a href="{{ url('/admin/brands/' . $item->brand_id) }}"  class="btn btn-success fa fa-eye"></a>
                                            <a href="{{ url('/admin/brands/' . $item->brand_id . '/edit') }}" class="btn btn-primary fa fa-edit" ></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/brands', $item->brand_id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger  btn fa-remove fa',
                                                        'title' => 'Delete Brand',
                                                        'onclick'=>'return confirm("Confirm delete?")',
                                                        
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                           




             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection