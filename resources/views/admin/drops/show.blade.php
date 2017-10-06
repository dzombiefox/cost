@extends('layouts.admin')
@section('content')
<section class="content-header">
<h1>
           <a href="{{ url()->previous() }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>    
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/drops')}}">Drops</a></li>
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
              <div >
                @foreach($drops as $item)                  
                                  <table  class="table table-bordered table-striped table-hover">
                                    <tr>
                                    <thead>
                                    <th>Item Code</th>
                                    <th>Price</th>
                                    <th>Volume</th> 
                                    <th>IDR</th> 
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $totalVolume=0;
                                    $totalIdr=0;
                                    $average=0;
                                    $totalRo=0;
                                    ?>
                                 @foreach($details as $data)
                                    @if(($data->periode_id==$item->periode_id )&&($data->category==0))                                
                                <tr >      
                                     <td >{{$data->itemDesc}}</td>
                                     <td style="text-align: right">{{$data->itemPrice}}</td>
                                     <td style="text-align: right">{{$data->dvolume}}</td>
                                     <td style="text-align: right">{{round(($data->dvolume/100)*$data->itemPrice,2)}}</td>
                                </tr>  
                                     <?php  
                                     
                               $totalVolume+=$data->dvolume;
                               $totalIdr+=round(($data->dvolume/100)*$data->itemPrice,2);
                               if($totalVolume==0 && $totalIdr==0)
                               {
                                   $average=0;
                               }
                               else{
                                   $average=round((($totalIdr*100)/$totalVolume),2);
                               }
                               ?>
                         
                                    @endif                                    
                                    @endforeach      
                                    <tr class="alt">
                                        <td colspan="2" >Amount</td>
                                        <td style="text-align: right"><?php echo $totalVolume;?></td>
                                        <td style="text-align: right"><?php echo $totalIdr;?></td>
                                    </tr>
                                  <tr>
                                        <td colspan="2">Average</td>
                                        <td colspan="2" style="text-align: right"><?=$average?></td>
                                    </tr>
                                     @foreach($details as $data)
                                    @if(($data->periode_id==$item->periode_id )&&($data->category==1))
                                    <?php  $totalRo=($data->itemPrice*$data->dvolume)/100;?>
                                <tr class="alt">      
                                     <td >{{$data->itemDesc}}</td>
                                     <td style="text-align: right">{{$data->itemPrice}}</td>                                  
                                     <td style="text-align: right">{{$data->dvolume}}</td>
                                     <td style="text-align: right" >{{($data->itemPrice*$data->dvolume)/100}}</td>
                                </tr> 
                                <tr >
                                        <td colspan="2">Average</td>
                                        <td colspan="2" style="text-align: right"><?php
                                        $totalAverage=$totalRo+$data->dvolume;
                                        echo $totalAverage; ?></td>
                                    </tr> 
                                    <tr class="alt">
                                        <td colspan="2">Size</td>
                                        <td colspan="2" style="text-align: right">{{$item->size}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Weight Wet</td>
                                        <td colspan="2" style="text-align: right">{{$item->weightWet}}</td>
                                    </tr>
                                    <tr class="alt">
                                        <td colspan="3">Weight Dry</td>
                                        <td style="text-align: right">{{App\Http\Controllers\admin\DropsController::getWeightDry($item->drop_id)}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Cost Dry</td>
                                        <td style="text-align: right">                                            
                                            {{App\Http\Controllers\admin\DropsController::getCostDry($item->drop_id,$item->periode_id,$item->year)}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Periode</td>
                                        <td style="text-align: right">                                            
                                            {{$item->periodeName}}
                                        </td>
                                    </tr>
                                @endif                                    
                                    @endforeach 
                                    
                                    </tbody>
                                </table>
                   <br>  
                       @endforeach                
                                    
               </div>
          </div>
       </div>  
       </div> 
       </section>  


@endsection