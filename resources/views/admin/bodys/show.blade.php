@extends('layouts.admin')
@section('content')
<section class="content-header">
      <h1>
           <a href="{{ url()->previous() }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>    
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Bodys</a></li>
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

@foreach($bodys as $item)
                  
                   <table  class="table table-bordered table-striped table-hover">
                                   <thead>
                                    <tr>
                                    
                                    <th>Item Code</th>
                                    <th>Price</th>
                                    <th>H20</th>
                                    <th>Price Dry</th>        
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
                                     <td style="text-align: right">{{$data->h2O}}</td>
                                     <td style="text-align: right">{{round($data->itemPrice/((100-$data->h2O)/100),2)}}</td>
                                     <td style="text-align: right">{{$data->dvolume}}</td>
                                     <td style="text-align: right">{{round((round($data->itemPrice/((100-$data->h2O)/100),2)/100) * $data->dvolume,2)}}</td>
                                </tr>  
                                
                               <?php  
                               $totalVolume+=$data->dvolume;
                               $totalIdr+=round((round($data->itemPrice/((100-$data->h2O)/100),2)/100) * $data->dvolume,2);
                               ?>
                                    @endif                                    
                                    @endforeach
                                    <tr class="alt">
                                        <td colspan="4" >Amount</td>
                                        <td style="text-align: right"><?php echo $totalVolume;?></td>
                                        <td style="text-align: right"><?php echo $totalIdr;?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Average</td>
                                        <td colspan="2" style="text-align: right"><?php echo round((($totalIdr*100)/$totalVolume),2);?></td>
                                    </tr>
                                  @foreach($details as $data)
                                    @if(($data->periode_id==$item->periode_id )&&($data->category==1))
                                    <?php  $totalRo=($data->itemPrice*$data->dvolume)/100;?>
                                <tr class="alt">      
                                     <td >{{$data->itemDesc}}</td>
                                     <td style="text-align: right">{{$data->itemPrice}}</td>
                                     <td style="text-align: right">{{$data->h2O}}</td>
                                     <td style="text-align: right">{{round($data->itemPrice/((100-$data->h2O)/100),2)}}</td>
                                     <td style="text-align: right">{{$data->dvolume}}</td>
                                     <td style="text-align: right" >{{($data->itemPrice*$data->dvolume)/100}}</td>
                                </tr>  
                                    
                                    @endif                                    
                                  @endforeach
                                  
                                    <tr >
                                        <td colspan="4">Average</td>
                                        <td colspan="2" style="text-align: right"><?php echo $totalRo+round((($totalIdr*100)/$totalVolume),2); ?></td>
                                    </tr> 
                                    <tr class="alt">
                                        <td colspan="4">Size</td>
                                        <td colspan="2" style="text-align: right">{{$item->size}}</td>
                                    </tr> 
                                      <tr>
                                        <td colspan="4">Weight Pcs</td>
                                        <td colspan="2" style="text-align: right">{{$item->weightPcs/1000}}</td>
                                    </tr> 
                                                        <tr>
                                        <td colspan="4">Weight Dry</td>
                                        <td colspan="2" style="text-align: right">  {{App\Http\Controllers\admin\BodysController::getWeightDry($item->body_id)}}</td>
                                    </tr> 
                                    <tr>
                                        <td colspan="4">Cost dry</td>
                                        <td colspan="2" style="text-align: right">{{number_format(App\Http\Controllers\admin\BodysController::getPrice($item->body_id,$item->periode_id,$item->year))}}</td>
                                    </tr> 
                                    <tr class="alt">
                                        <td colspan="4">Periode</td>
                                        <td colspan="2" style="text-align: right"><u>{{$item->periodeName}}</u></td>
                                    </tr> 
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