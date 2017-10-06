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
 <div class="table-responsive">
<table class="table table-bordered table-hover" >
                          
                                <thead>
                                    <tr>
                                        <th style="width: 2%">NO</th>
                                        <th> Date </th>
                                        <th>ItemCode</th>
                                        <th> Motif </th>
                                        <th> Brand</th>
                                        <th> Line</th>
                                        <th>RawMaterial </th>
                                        <th > BoxPallet</th>
                                        <th> DirectLabour</th>
                                        <th> MPGOverHead</th>
                                        <th> ProCost</th>
                                        <th> VatOverHead</th>
                                        <th> FixedOprExp</th>
                                        <th> CarriageCharge</th>
                                        <th> BrokenDisc</th>
                                        <th>MarketingExp</th>
                                        <th>CostBeforeDisc</th>
                                        <th>SellKw1</th>
                                        <th>SellKw2</th>
                                        <th>SellKw3</th>
                                        <th>SellKw4</th>
                                        <th>SellKw5</th>
                                        <th>HppKw1</th>
                                        <th>HppKw2</th>
                                        <th>HppKw3</th>
                                        <th>HppKw4</th>
                                        <th>HppKw5</th>
                                        <th>GrossProvitAmmount</th>
                                        <th>%</th>
                                        <th>SalesInc</th>
                                        <th>SalesBonus</th>
                                        <th>TotalSalesDisc+Package</th>
                                        <th>GrossCostBeforeDisc</th>
                                        <th>NetProfitAmmount</th>
                                        <th>%</th>
                                        <th>SalesCommission</th>
                                        <th>CostAfterSalesCommission</th>
                                        <th>NetProfitAfterSalesCommission</th>
                                        <th>%</th>
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
                                         <td>{{number_format($total)}}</td>
                                        <td >{{ $item->f_cboxPallet }}</td>
                                        <td>{{number_format($item->f_directLabour,2) }}</td>
                                        <td>
                                        
                                        <?php 
                                        $poh=$item->c_overHead;
                                        $pbrokDisc=$item->c_brokenDisc;
                                        $psalCom=$item->c_salesCom;
                                        $totPersen=$poh+$pbrokDisc+$psalCom;
                                        $mpg=$item->f_fuelExp+$item->f_waterElectrict+$item->f_packingExp+$item->f_maintenanceExp+$item->f_depreciationExp+$item->f_otherExp+$item->f_employeeBenefit;
                                        $procost=$total+$mpg+$item->f_directLabour+$item->f_cboxPallet;
                                        $vatOverHead=$item->c_overHead*$item->skw_1;
                                        $fixOverHead= $item->c_salary+$item->c_employeeBenefit+$item->c_otherExp;
                                        $brokenDisc=$item->c_brokenDisc*$item->skw_1;
                                        $CostBeforeDisc=$procost+$vatOverHead+$fixOverHead+$item->c_carriageCharge+$brokenDisc+$item->c_mktOperational; 
                                        $GrossProvitAmmount=$item->skw_1-$CostBeforeDisc;
                                        $persen=100*($GrossProvitAmmount/$CostBeforeDisc);
                                        $SalesInc=$item->c_salesIncentives;
                                        $SalesBonus=$item->c_salesBonus;
                                        $totalSalesDisc=$SalesInc+$SalesBonus;
                                        $grossCostBeforeDisc=$CostBeforeDisc+$totalSalesDisc;
                                        $netProfitAmmount=$item->skw_1-$grossCostBeforeDisc;
                                        $persenProfit=100*($netProfitAmmount/($CostBeforeDisc+$totalSalesDisc)) ;
                                        $SalesCommission=$item->skw_1*$item->c_salesCom;
                                        $CostAfterSalesCommission=$grossCostBeforeDisc+$SalesCommission;
                                        $NetProfitAfterSalesCommission=$item->skw_1-$CostAfterSalesCommission;
                                        $persenProfitAfterSalesCom=100*($NetProfitAfterSalesCommission/$CostAfterSalesCommission);
                                        
                                        $kw2=$procost+($totPersen*$item->skw_2)+$fixOverHead+$item->c_carriageCharge+$item->c_mktOperational+$totalSalesDisc;

                                        $kw3=$procost+($totPersen*$item->skw_3)+$fixOverHead+$item->c_carriageCharge+$item->c_mktOperational+$totalSalesDisc;
                                        $kw4=$procost+$fixOverHead+$item->c_carriageCharge+$totalSalesDisc-$SalesBonus;
                                        ?>
                                        <?=number_format($mpg,2)?>
                                        </td>
                                        <td><?=number_format($procost,2)?></td>        
                                        <td><?=number_format($vatOverHead,2)?></td>
                                        <td><?=number_format($fixOverHead,2)?></td>                   
                                        <td>{{$item->c_carriageCharge}}</td>
                                        <td><?=number_format($brokenDisc,2)?></td>
                                        <td>{{number_format($item->c_mktOperational,2)}}</td>
                                        <td><?=number_format($CostBeforeDisc,2)?></td>
                                        <td>{{number_format($item->skw_1)}}</td>
                                        <td>{{number_format($item->skw_2)}}</td>
                                        <td>{{number_format($item->skw_3)}}</td>
                                        <td>{{number_format($item->skw_4)}}</td>
                                        <td>{{number_format($item->skw_5)}}</td>
                                        <td><?=number_format($CostAfterSalesCommission,2)?></td>
                                        <td><?=number_format($kw2,2)?></td>
                                        <td><?=number_format($kw3,2)?></td>
                                        <td><?=number_format($kw4,2)?></td>
                                        <td><?=number_format($kw4,2)?></td>
                                        <td><?=number_format($GrossProvitAmmount,2)?></td>                  
                                        <td><?=number_format($persen,2)?></td>
                                        <td><?=number_format($SalesInc,2)?></td>
                                        <td><?=number_format($SalesBonus,2)?></td>
                                        <td><?=number_format($totalSalesDisc,2)?></td>
                                        <td><?=number_format($grossCostBeforeDisc,2)?></td>
                                        <td><?=number_format($netProfitAmmount,2)?></td>
                                        <td><?=number_format($persenProfit,2)?></td>
                                        <td><?=number_format($SalesCommission,2)?></td>
                                        <td><?=number_format($CostAfterSalesCommission,2)?></td>
                                        <td><?=number_format($NetProfitAfterSalesCommission,2)?></td>
                                        <td><?=number_format($persenProfitAfterSalesCom,2)?></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                           </div>
                        </div>

                    </div>
                </div>
            </div>
       </section>
@endsection