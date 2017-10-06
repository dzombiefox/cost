@extends('layouts.admin')

@section('content')
<section class="content-header">
      <h1>
       View Finish Item      
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
         
 
                              <a href="{{ url('/admin/finishs') }}" title="Back" class="pull-right"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                       <a href="{{ url('/admin/finishs/' . $finish->finish_id . '/edit') }}" class="btn btn-primary fa fa-edit" data-position="right" ></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/finishs', $finish->finish_id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger  btn fa-remove fa',
                                    'title' => 'Delete Finish',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td><strong>Motif</strong></td>
                                        <td>:</td>
                                        <td>{{ $finish->motifName }}</td>
                                        <td>&nbsp;</td>
                                        <td><strong>Body</strong></td>
                                        <td>:</td>
                                        <td><strong><a href="{{url('admin/bodys/'.$finish->bodyId)}}" >{{$finish->bodyName}}</a></strong</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Size</strong></td>
                                        <td>:</td>
                                        <td>{{ $finish->size }}</td>
                                        <td>&nbsp;</td>
                                        <td><strong>Alumina</strong></td>
                                        <td>:</td>
                                        <td><strong><a href="{{url('admin/aluminas/'.$finish->aluminaId)}}" >{{$finish->aluminaName}}</a></strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Color</strong></td>
                                        <td>:</td>
                                        <td>{{ $finish->colorName }}</td>
                                        <td>&nbsp;</td>
                                        <td><strong>Engobe</strong></td>
                                        <td>:</td>
                                        <td><strong><a href="{{url('admin/engobes/'.$finish->engobeId)}}" >{{$finish->engobeName}}</a></strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Option</strong></td>
                                        <td>:</td>
                                        <td>{{ $finish->opt }}</td>
                                        <td>&nbsp;</td>
                                        <td><strong>Glaze</strong></td>
                                        <td>:</td>
                                        <td><strong><a href="{{url('admin/glazes/'.$finish->glazeId)}}" >{{$finish->glazeName}}</a></strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Code Ref</strong></td>
                                        <td>:</td>
                                        <td>{{ $finish->codeRef }}</td>
                                        <td>&nbsp;</td>
                                        <td><strong>Drop</strong></td>
                                        <td>:</td>
                                        <td><strong><a href="{{url('admin/drops/'.$finish->dropId)}}" >{{$finish->dropName}}</a></td>
                                    </tr>
                                    <tr>
                                        <th><strong>Year / Month</strong></th>
                                        <td>:</td>
                                        <td>{{ $finish->periodeName }}/{{$finish->year}}</td>
                                         <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        
                                    </tr>
                                </tbody>
                               
                            </table>

                            <div class="row">
        
         <!-- Custom Tabs -->
        <div class="col-md-12">
          <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#pasta" data-toggle="tab">Pasta</a></li>
              <li><a href="#roller" data-toggle="tab">Roller</a></li>
              <li><a href="#ink" data-toggle="tab">Ink</a></li>
          
              <li class="pull-left header"><i class="fa fa-th"></i> Extra material </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="pasta">
              <div class="box-body">

<table class="table table-bordered table-hover" >
                      
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th> PastaName </th>
                                        <th> Size </th>
                                        <th> Color</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pastas as $item)
                                    <tr>
                                        <td style="width: 2%">{{ $loop->iteration }}</td>
                                        <td>{{ $item->pastaName }}</td>
                                        <td>{{ $item->size }}</td>
                                        <td>{{ $item->colorName }}</td>
                                        <td style="width: 15%">
                                             <a href="{{ url('/admin/pastas/' . $item->pasta_id) }}"  class="btn btn-success fa fa-eye"></a>
                                        </td>
                                    </tr>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                           
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="roller">
              <div class="box-body">
                  <table class="one responsive-table highlight table nowrap dataTable dtr-inline bordered" >
                   
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
                                        <th>#</th>
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
                                        <a href="{{ url('/admin/rollers/' . $item->roller_id) }}"  class="btn btn-success fa fa-eye pull-right">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            
                        </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="ink">
                 <div class="box-body">

<table class="table table-bordered table-hover" >
                           
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th> InkName </th>
                                        <th> SizeId </th>
                                        <th> ColorId </th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($inks as $item)
                                    <tr>
                                        <td style="width: 2%">{{ $loop->iteration }}</td>
                                        <td>{{ $item->inkName }}</td>
                                        <td>{{ $item->size }}</td>
                                        <td>{{ $item->colorName }}</td>
                                        <td style="width: 15%">
                                            <a href="{{ url('/admin/inks/' . $item->ink_id) }}"  class="btn btn-success fa fa-eye pull-right"></a>
                                           
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                         
                    </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
          <!-- nav-tabs-custom -->
        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection