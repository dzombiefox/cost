@extends('layouts.admin')

@section('content')
<script type="text/javascript">
    $(document).ready(function(){
        var frm=$(".form-save");
        frm.submit(function(e){

            $.ajax({
                url:frm.attr('action'),
                data:frm.serialize(),
                type:frm.attr('method'),
                success:function(){
                      alert("Data Update !!")
                }
            });
          
            e.preventDefault();

        });
        $(".coh").number(true,4);
        $(".cbd").number(true,4);
        $(".cscom").number(true,4);
        $(".dlabour").number(true,2);
        $(".cbon").number(true,2);
        $(".ebenefit").number(true,2);
        $(".fexp").number(true,2);
        $(".welectrict").number(true,2);
        $(".pexp").number(true,2);
        $(".mexp").number(true,2);
        $(".dexp").number(true,2);
        $(".oexp").number(true,2);
        $(".cpallet").number(true,2);
        $(".salary").number(true,2);
        $(".ebenefit").number(true,2);
        $(".ccharge").number(true,2);
        $(".mopr").number(true,2);
        $(".dlabour").number(true,2);
        $(".dlabour").number(true,2);
        $(".dlabour").number(true,2);
        $(".sinc").number(true,2);
        $(".capacity").number(true);
        $(".year").select2();
        $(".periode").select2();
        $(".line").select2();
        $(".size").select2();
    });
</script>
 <section class="content-header">
      <h1>
       Create Production Cost     
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/pcosts')}}">Production Cost</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">

        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($pcost, [
                            'method' => 'PATCH',
                            'url' => ['/admin/pcosts', $pcost->pcost_id],
                            'class' => 'form-horizontal form-save',
                            'files' => true,
                          
                        ]) !!}

                        <div class="box-body"> 

<fieldset class="scheduler-border">
    <legend class="scheduler-border">Cost Factory</legend>
  
    <div class="form-group" style="margin-right: 15px">
   <label class="control-label col-sm-2">Direct Labour</label>
   <div class="col-md-2">
 {!! Form::text('f_directLabour', null, ['class' => 'form-control dlabour','value'=>'0,00']) !!}
   </div>
    <label class="control-label col-sm-2">Employee Benefit</label>
     <div class="col-md-2">
       {!! Form::text('f_employeeBenefit', null, ['class' => 'form-control ebenefit']) !!}
     </div>
     <label class="control-label col-sm-2">Fuel Expenses</label>
     <div class="col-md-2">
       {!! Form::text('f_fuelExp', null, ['class' => 'form-control fexp']) !!}
     </div>
</div>
  
        <div class="form-group" style="margin-right: 15px">
   <label class="control-label col-sm-2">Water Electrict</label>
   <div class="col-md-2">
 {!! Form::text('f_waterElectrict', null, ['class' => 'form-control welectrict']) !!}
   </div>
    <label class="control-label col-sm-2">Packing Expenses</label>
     <div class="col-md-2">
       {!! Form::text('f_packingExp', null, ['class' => 'form-control pexp']) !!}
     </div>
     <label class="control-label col-sm-2">Maintenance Expenses</label>
     <div class="col-md-2">
       {!! Form::text('f_maintenanceExp', null, ['class' => 'form-control mexp']) !!}
     </div>
</div>

        <div class="form-group" style="margin-right: 15px">
   <label class="control-label col-sm-2">Depreciation Expenses</label>
   <div class="col-md-2">
 {!! Form::text('f_depreciationExp', null, ['class' => 'form-control dexp']) !!}
   </div>
    <label class="control-label col-sm-2">Other Expenses</label>
     <div class="col-md-2">
       {!! Form::text('f_otherExp', null, ['class' => 'form-control oexp']) !!}
     </div>
     <label class="control-label col-sm-2">Carton Box & Pallet</label>
     <div class="col-md-2">
       {!! Form::text('f_cboxPallet', null, ['class' => 'form-control cpallet']) !!}
     </div> 
     
</div>
</fieldset>


<fieldset class="scheduler-border">
    <legend class="scheduler-border">Cost head office</legend>
  
         <div class="form-group" style="margin-right: 15px">
   <label class="control-label col-sm-2">Salary</label>
   <div class="col-md-2">
 {!! Form::text('c_salary', null, ['class' => 'form-control salary']) !!}
   </div>
    <label class="control-label col-sm-2">Employee Benefit</label>
     <div class="col-md-2">
       {!! Form::text('c_employeeBenefit', null, ['class' => 'form-control ebenefit']) !!}
     </div>
     <label class="control-label col-sm-2">Carriage Charge</label>
     <div class="col-md-2">
       {!! Form::text('c_carriageCharge', null, ['class' => 'form-control ccharge']) !!}
     </div> 
     
</div>
 <div class="form-group" style="margin-right: 15px">
   <label class="control-label col-sm-2">Other Expenses</label>
   <div class="col-md-2">
 {!! Form::text('c_otherExp', null, ['class' => 'form-control oexp']) !!}
   </div>
    <label class="control-label col-sm-2">Marketing Operational</label>
     <div class="col-md-2">
       {!! Form::text('c_mktOperational', null, ['class' => 'form-control mopr']) !!}
     </div>
     <label class="control-label col-sm-2">Sales Incentives</label>
     <div class="col-md-2">
       {!! Form::text('c_salesIncentives', null, ['class' => 'form-control sinc']) !!}
     </div> 

     
</div>
 <div class="form-group" style="margin-right: 15px">
   <label class="control-label col-sm-2">Vat overHead %</label>
   <div class="col-md-2">
 {!! Form::text('c_overHead', null, ['class' => 'form-control coh']) !!}
   </div>
    <label class="control-label col-sm-2">Broken Disc%</label>
     <div class="col-md-2">
       {!! Form::text('c_brokenDisc', null, ['class' => 'form-control cbd']) !!}
     </div>
     <label class="control-label col-sm-2">Sales Bonus</label>
     <div class="col-md-2">
       {!! Form::text('c_salesBonus', null, ['class' => 'form-control cbon ']) !!}
     </div> 

     
</div>
<div class="form-group" style="margin-right: 15px">
     <label class="control-label col-sm-2">Sales Commision%</label>
     <div class="col-md-2">
       {!! Form::text('c_salesCom', null, ['class' => 'form-control cscom']) !!}
     </div> 

     
</div>
    
</fieldset>
<br>

            <div class="form-group" style="margin-right: 15px">
   <label class="control-label col-sm-1">Size</label>
   <div class="col-md-2">
<select name="sizeId" class="form-control size">
    @foreach($sizes as $data)
      <option value="{{ $data->size_id }}"   @if($data->size_id==$pcost->sizeId) selected='selected' @endif >{{ $data->size }}</option>  
    @endforeach
</select>
   </div>
    <label class="control-label col-sm-1">Line</label>
     <div class="col-md-1">
       <select name="lineId" class="form-control line">
    @foreach($lines as $data)
     <option value="{{ $data->line_id }}"   @if($data->line_id==$pcost->lineId) selected='selected' @endif >{{ $data->lineName }}</option>

    @endforeach
</select>
     </div>
     <label class="control-label col-sm-1">Capacity</label>
     <div class="col-md-1">
       {!! Form::text('capacity', null, ['class' => 'form-control capacity']) !!}
     </div>
   <label class="control-label col-sm-1">Year/Month</label>
   <div class="col-md-2">
      <select name="year" class="year" style="width: 36%">  
              @foreach($year as $data)
               <option>{{$data->year}}</option>
              @endforeach
           </select>
            <select name="periodeId" class="periode" style="width: 62%">            
              @foreach($periodes as $data)
               <option value="{{ $data->periode_id }}"   @if($data->periode_id==$pcost->periodeId) selected='selected' @endif >{{ $data->periodeName }}</option>
              @endforeach
           </select>
   </div>
     <div class="col-md-2">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Save', ['class' => ' btn btn-primary btnsave']) !!}
     

     </div> 


</div> 
</div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </section>
@endsection