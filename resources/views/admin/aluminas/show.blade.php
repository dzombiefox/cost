@extends('layouts.admin')
@section('content')
<section class="content-header">
     
       <h1>
           <a href="{{ url()->previous() }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>    
      </h1>    
     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/aluminas')}}">Aluminas</a></li>
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
                   @foreach($aluminas as $item)
                   <table class="table table-bordered table-striped table-hover" >
                                    
                                    <thead>
                                    <tr>
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
                                          ?>
                                        @foreach($details as $data)
                                         @if($data->periode_id==$item->periode_id )
                                     <tr >      
                                     <td >{{$data->itemDesc}}</td>
                                     <td style="text-align: right">{{$data->itemPrice}}</td>
                                     <td style="text-align: right">{{$data->dvolume}}</td>
                                     <td style="text-align: right">{{($data->dvolume/100)*$data->itemPrice}}</td>
                                     </tr> 
                                            <?php  
                                            $totalVolume+=$data->dvolume;
                                            $totalIdr+=round(($data->dvolume/100)*$data->itemPrice,2);
                                            ?>
                                             @endif
                                        @endforeach
                                    <tr class="alt">
                                        <td colspan="2" >Amount</td>
                                        <td style="text-align: right"><?php echo $totalVolume;?></td>
                                        <td style="text-align: right"><?php echo $totalIdr;?></td>
                                    </tr>
                                    <tr >
                                        <td colspan="2" >Average</td>
                                        <td style="text-align: right" colspan="2"><?php echo round(($totalIdr*100)/$totalVolume,2);?></td>
                                    </tr>
                                    <tr >
                                        <td colspan="2" >Sizes</td>
                                        <td style="text-align: right" colspan="2">{{$item->size}}</td>
                                    </tr>
                                    <tr >
                                        <td colspan="2" >Weight Pcs</td>
                                        <td style="text-align: right" colspan="2">{{$item->weightPcs}}</td>
                                    </tr>
                                     <tr >
                                        <td colspan="2" >Weight Dry</td>
                                        <td style="text-align: right" colspan="2">{{$item->weightPcs*$item->quantity}}</td>
                                    </tr>
                                     <tr >
                                        <td colspan="2" >Cost Dry</td>
                                        <td style="text-align: right" colspan="2">{{number_format(($item->weightPcs*$item->quantity)*round(($totalIdr*100)/$totalVolume,2))}}</td>
                                    </tr>
                                    <tr class="alt">
                                        <td colspan="2">Periode</td>
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