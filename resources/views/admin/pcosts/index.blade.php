@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>&nbsp;</h1>
    <!--  <a href="{{ url('/admin/brands/create') }}" title="Back" class=""><button class="btn btn-warning btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Brand</button></a> -->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Production Cost</a></li>
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
                  <table class="one responsive-table highlight table nowrap dataTable dtr-inline bordered table-bordered" id="example" style="width: 100%" >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Line</th>
                                        <th>Size </th>
                                        <th>Year / Month</th>
                                        <th > Capacity </th>
                                        <th > BoxPallet</th>
                                        <th> DirectLabour</th>
                                        <th> EmployeeBenefit</th>
                                        <th> FuelExp</th>
                                        <th> WaterElectrict</th>
                                        <th> PackingExp</th>
                                        <th> MaintenanceExp</th>
                                        <th> DepreciationExp</th>
                                        <th> OtherExp</th>
                                        <th> Salary</th>
                                        <th> EmployeeBenefit</th>
                                        <th> Carriagecharge</th>
                                        <th> OtherExp</th>
                                        <th> MarketingOpr</th>
                                        <th> SalesIncentive</th>
                                        <th> SalesBonus</th>
                                        <th> VatOverhead%</th>
                                        <th> BrokenDisc%</th>
                                        <th> SalesCommision</th>
                                        <th><a href="{{ url('/admin/pcosts/create') }}" title="Back" class="pull-right"><button class="btn btn-warning btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Production Cost</button></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pcosts as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$item->lineName}}</td>
                                        <td>{{ $item->size }}</td>
                                        <td>{{$item->periodeName}}&nbsp;{{$item->year}}</td>
                                        <td>{{ $item->capacity }}</td>
                                        <td style="width: 450px">{{ $item->f_cboxPallet }}</td>
                                        <td>{{number_format($item->f_directLabour,2) }}</td>
                                        <td>{{number_format($item->f_employeeBenefit,2)}}</td>
                                        <td>{{number_format($item->f_fuelExp,2)}}</td>
                                        <td>{{number_format($item->f_waterElectrict,2)}}</td>
                                        <td>{{number_format($item->f_packingExp,2)}}</td>
                                        <td>{{number_format($item->f_maintenanceExp,2)}}</td>
                                        <td>{{number_format($item->f_depreciationExp,2)}}</td>
                                        <td>{{number_format($item->f_otherExp,2)}}</td>
                                        <td>{{number_format($item->c_salary,2)}}</td>
                                        <td>{{number_format($item->c_employeeBenefit,2)}}</td>
                                        <td>{{number_format($item->c_carriageCharge,2)}}</td>
                                        <td>{{number_format($item->c_otherExp,2)}}</td>
                                        <td>{{number_format($item->c_mktOperational,2)}}</td>
                                        <td>{{number_format($item->c_salesIncentives,2)}}</td>
                                        <td>{{number_format($item->c_salesBonus,2)}}</td>
                                        <td>{{number_format($item->c_overHead,4)}}</td>
                                        <td>{{number_format($item->c_brokenDisc,2)}}</td>
                                        <td>{{number_format($item->c_salesCom,2)}}</td>
                                             <td style="width: 15%">
                                            <a href="{{ url('/admin/pcosts/' . $item->pcost_id) }}"  class="btn btn-success fa fa-eye"></a>
                                            <a href="{{ url('/admin/pcosts/' . $item->pcost_id . '/edit') }}" class="btn btn-primary fa fa-edit" ></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/pcosts', $item->pcost_id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger  btn fa-remove fa',
                                                        'title' => 'Delete Data',
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
            </div>
      </section>
@endsection