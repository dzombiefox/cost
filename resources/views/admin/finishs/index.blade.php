@extends('layouts.admin')

@section('content')
<section class="content-header">
    <h1>&nbsp;</h1>
    <!--  <a href="{{ url('/admin/brands/create') }}" title="Back" class=""><button class="btn btn-warning btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Brand</button></a> -->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">FInish Items</a></li>
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
                                        <th style="width: 2%">NO</th>
                                        <th> Date </th>
                                        <th>Item Code</th>
                                        <th> Motif </th>
                                        <th> Brand</th>
                                        <th> Line</th>
                                        <th> Body</th>
                                        <th> Alumina</th>
                                        <th> Engobe</th>
                                        <th> Glaze</th>
                                        <th> Drop</th>
                                        <th>Pasta</th>
                                        <th>Roller</th>
                                        <th>INK</th>
                                        <th> Total </th>
                                        <th><a href="{{ url('/admin/finishs/create') }}" title="Back" class="pull-right"><button class="btn btn-warning btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Finish Item</button></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $total=0;
                                    $pasta=0;
                                    $total=0;
                                    $roller=0;
                                    
                                    $bodys=new \App\Http\Controllers\admin\BodysController;
                                    $aluminas=new \App\Http\Controllers\admin\AluminasController;
                                    $engobes=new \App\Http\Controllers\admin\EngobesController;
                                    $glazes=new \App\Http\Controllers\admin\GlazesController;
                                    $pastas=new \App\Http\Controllers\admin\PastasController;
                                    $inks=new \App\Http\Controllers\admin\InksController;
                                    $drops=new \App\Http\Controllers\admin\DropsController;
                                    ?>
                                @foreach($finishs as $item)
                                <?php 
                                    $ink=0;
                                    $body=$bodys->getPrice($item->bodyId,$item->periodeId,$item->year);
                                    $alumina=$aluminas->getPrice($item->aluminaId,$item->periodeId,$item->year); 
                                    $engobe=$engobes->getCostDry($item->engobeId,$item->periodeId,$item->year); 
                                    $glaze=$glazes->getCostDry($item->glazeId,$item->periodeId,$item->year);
                                    $drop=$drops->getCostDry($item->dropId,$item->periodeId,$item->year);
                                   
                                    ?>
                                    @if($item->opt==1)
                                   <?php  $total=$body+$alumina+$engobe+$glaze+$drop; ?>
                                    
                                    @endif
                                @if($item->opt==2)  
                                <?php $ink=0;?>
                                <!-- foreach fpastas-->
                                    @foreach($fpastas as $data)                                
                                        @if($item->finish_id==$data->finishId)
                                        <?php 
                                        $pasta+=$pastas->getCostDry($data->pastaId,$item->periodeId,$item->year);
                                        ?>
                                        @endif                             
                                    @endforeach <!--end foreach -->
                                
                                 <!-- foreach froller -->
                                @foreach($frollers as $data)
                                        @if($item->finish_id==$data->finishId)
                                        <?php $roller+=$data->printing; ?>
                                        @endif
                                @endforeach    <!-- end foreach-->     
                               <?php  $total=$body+$alumina+$engobe+$glaze+$drop+$pasta+$roller; ?>
                                @endif <!--end if -->
                                  
                                @if($item->opt==3)
                                    @foreach($finks as $data)
                                    @if($data->finishId==$item->finish_id)
                                    <?php 
                                    $roller=0;
                                    $pasta=0;
                                    $ink+=$inks->getCostDry($data->inkId,$item->periodeId,$item->year);
                                    ?>
                                    @endif

                                    @endforeach<!-- end foreach-->    
                                    <?php $total=$body+$alumina+$engobe+$glaze+$drop+$ink; ?>
                                @endif
                                    <tr>
                                        <td style="width: 2%">{{ $loop->iteration }}</td>
                                        <td>{{ substr($item->created_at,0,10) }}</td>
                                        <td>{{substr($item->brandName,0,1)}}{{$item->refId}}{{$item->motifCode}}{{$item->codeRef}}{{$item->colorCode}}</td>
                                        <td>{{ $item->motifName }}&nbsp;{{$item->size}}&nbsp;{{$item->colorName}}</td>
                                        <td>{{ $item->brandName}}</td>
                                        <td>{{ $item->lineName}}</td>
                                        <td>{{number_format(App\Http\Controllers\admin\BodysController::getPrice($item->bodyId,$item->periodeId,$item->year))}}</td>
                                        <td>{{number_format(App\Http\Controllers\admin\AluminasController::getPrice($item->aluminaId,$item->periodeId,$item->year))}}</td>
                                        <td>{{App\Http\Controllers\admin\EngobesController::getCostDry($item->engobeId,$item->periodeId,$item->year)}}</td>
                                        <td>{{App\Http\Controllers\admin\GlazesController::getCostDry($item->glazeId,$item->periodeId,$item->year)}}</td>
                                        <td>{{App\Http\Controllers\admin\DropsController::getCostDry($item->dropId,$item->periodeId,$item->year)}}</td>
                                        <td><?=$pasta?></td>
                                        <td><?=$roller?></td>
                                         <td>{{number_format($ink)}}</td>
                                        <td>{{number_format($total)}}</td>
                                        <td>
                                            <a href="{{ url('/admin/finishs/' . $item->finish_id) }}"  class="btn btn-success fa fa-eye"></a>
                                            <a href="{{ url('/admin/finishs/' . $item->finish_id . '/edit') }}" class="btn btn-primary fa fa-edit" ></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/finishs', $item->finish_id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger  btn fa-remove fa',
                                                        'title' => 'Delete Finish Item',
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