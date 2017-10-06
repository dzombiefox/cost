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
                                        <th> MotifCode </th>
                                        <th> MotifName </th>
                                        <th> Type </th>
                                        <th> Brand </th>
                                        <th> Option </th>
                                        <th><a href="{{ url('/admin/motifs/create') }}" title="Back" class="pull-right"><button class="btn btn-warning btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Motifs</button></a></th>
                                    </tr>
                   </thead>
                                <tbody>
                                @foreach($motifs as $item)
                                    <tr>
                                        <td style="width: 2%">{{ $loop->iteration }}</td>
                                        <td>{{ $item->motifCode }}</td>
                                        <td>{{ $item->motifName }}</td>
                                        <td>{{ $item->typeName }}</td>
                                        <td>{{ $item->brandName }}</td>
                                        <td>{{ $item->optionName }}</td>
                                        <td style="width: 15%">
                                        <a href="{{ url('/admin/motifs/' . $item->motif_id) }}"  class="btn btn-success fa fa-eye"></a>
                                           <a href="{{ url('/admin/motifs/' . $item->motif_id . '/edit') }}" class="btn btn-primary fa fa-edit" ></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/motifs', $item->motif_id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger  btn fa-remove fa',
                                                        'title' => 'Delete Motif',
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