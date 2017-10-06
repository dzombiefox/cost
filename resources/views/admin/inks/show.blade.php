@extends('layouts.admin')
@section('content')
<section class="content-header">
     <h1>
           <a href="{{ url()->previous() }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>    
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/inks')}}">Inks</a></li>
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
                 
                 
                   @foreach($inks as $item)
                  
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
                                    @if(($data->periode_id==$item->periode_id ))                                
                                <tr >      
                                     <td >{{$data->itemDesc}}</td>
                                     <td style="text-align: right">{{$data->itemPrice}}</td>
                                     <td style="text-align: right">{{$data->dvolume}}</td>
                                     <td style="text-align: right">{{round(($data->dvolume/100)*$data->itemPrice,2)}}</td>
                                </tr>  
                                     <?php  
                               $totalVolume+=$data->dvolume;
                               $totalIdr+=round(($data->dvolume/1000)*$data->itemPrice,2);
                               ?>
                         
                                    @endif                                    
                                    @endforeach
                                    <tr class="alt">
                                        <td colspan="2" >Amount</td>
                                        <td style="text-align: right"><?php echo $totalVolume;?></td>
                                        <td style="text-align: right"><?php echo number_format($totalIdr,2);?></td>
                                    </tr>
                               
                                     <tr>
                                        <td colspan="2">Size</td>
                                        <td colspan="2" style="text-align: right">{{$item->size}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Periode</td>
                                        <td style="text-align: right">                                            
                                            {{$item->periodeName}}
                                        </td>
                                    </tr>  
                                    </tbody>
                                    </tr>
                                    </table>                                                                 
                                  @endforeach
               </div>
          </div>
       </div>  
       </div> 
       </section>  
@endsection