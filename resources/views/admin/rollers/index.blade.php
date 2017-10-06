@extends('layouts.admin')
@section('content')
   <section class="content-header">
    <h1>&nbsp;</h1>
    <!--  <a href="{{ url('/admin/brands/create') }}" title="Back" class=""><button class="btn btn-warning btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Brand</button></a> -->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Motifs</a></li>
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
                                        <th> RollerCode </th>
                                        <th> RollerName </th>
                                        <th> Sub Code </th>
                                        <th> Status </th>
                                        <th> Motif </th>
                                        <th> Life Time </th>
                                        <th> Price </th>
                                        <th> Price / Printing </th>
                                        <th><a href="{{ url('/admin/rollers/create') }}" title="Back" class="pull-right"><button class="btn btn-warning btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Rollers</button></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($rollers as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->rollerCode }}</td>
                                        <td>{{ $item->rollerName }}</td>
                                        <td>
                                            @if(($item->subCode) === '0')
                                                 A
                                            @elseif(($item->subCode) === '1')
                                                             B
                                            @elseif(($item->subCode) === '2')
                                                C
                                            @else
                                                D    
                                            @endif
                                            </td>
                                            <td>
                                                @if($item->status==='0')
                                                OK
                                                @else
                                                NOT OK
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->motif==='0')
                                                RANDOM
                                                @else
                                                CENTER
                                                @endif
                                            </td>
                                            <td>
                                                {{ $item->lifeTime}}
                                            </td>
                                            <td>
                                                {{ $item->price}}
                                            </td>
                                            <td>
                                                {{ $item->printing}}
                                            </td>
                                        <td style="width: 15%">
                                        <a href="{{ url('/admin/rollers/' . $item->roller_id) }}"  class="btn btn-success fa fa-eye"></a>
                                           <a href="{{ url('/admin/rollers/' . $item->roller_id . '/edit') }}" class="btn btn-primary fa fa-edit" ></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/rollers', $item->roller_id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger  btn fa-remove fa',
                                                        'title' => 'Delete Roller',
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