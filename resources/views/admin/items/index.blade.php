@extends('layouts.admin')
@section('content')
<section class="content-header">
    <h1>&nbsp;</h1>
    <!--  <a href="{{ url('/admin/brands/create') }}" title="Back" class=""><button class="btn btn-warning btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Brand</button></a> -->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Items</a></li>
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
                                        <th> ItemCode </th>
                                        <th> ItemName </th>
                                        <th> ItemDesc </th>
                                        <th> Volume </th>
                                        <th> Color </th>
                                        <th><a href="{{ url('/admin/items/create') }}" title="Back" class="pull-right"><button class="btn btn-warning btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Items</button></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td style="width: 2%">{{ $item->item_id }}</td>
                                        <td>{{ $item->itemCode }}</td>
                                        <td>{{ $item->itemName }}</td>
                                        <td>{{ $item->itemDesc }}</td>
                                        <td>{{ $item->volume }}</td>
                                        <td>{{ $item->color }}</td>
                                        <td>
                                           <a href="{{ url('/admin/items/' . $item->item_id) }}"  class="btn btn-success fa fa-eye"></a>
                                           <a href="{{ url('/admin/items/' . $item->item_id . '/edit') }}" class="btn btn-primary fa fa-edit" ></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/items', $item->item_id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger  btn fa-remove fa',
                                                        'title' => 'Delete Items',
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