
    <div class="input-field col s12">
    <label class="active" for="first_name2">Roller Code</label>
     {!! Form::text('rollerCode', null, ['class' => 'form-control','required']) !!}
      
    </div>    


    <div class="input-field col s12">
     <label class="active" for="first_name2">Roller Name</label>
     {!! Form::text('rollerName', null, ['class' => 'form-control','required']) !!}
     
    </div>    

    <div class="input-field col s12">
     <label class="active" for="first_name2">Sub Code</label>
 {!! Form::select('subCode', ['A', 'B', 'C', 'D'], null, ['class' => 'form-control']) !!}
    </div>
     
 
    <div class="input-field col s12">
     <label class="active" for="first_name2">Status</label>
 {!! Form::select('status', ['OK', 'NOT OK'], null, ['class' => 'form-control']) !!}
    </div>
   

    <div class="input-field col s12">
     <label class="active" for="first_name2">Motif</label>
  {!! Form::select('motif', ['RANDOM', 'CENTER'], null, ['class' => 'form-control']) !!}
    </div>
     



    <div class="input-field col s12">
    <label class="active" for="first_name2">Price</label>
     {!! Form::text('price', null, ['class' => 'form-control','required']) !!}
      
    </div>    




<div class="right ">
<label>&nbsp;</label>
<br>
        <button class="btn btn-sm btn-primary pull-right" type="submit" name="action" id="save"><i class="fa fa-save" aria-hidden="true"></i>&nbsp;SAVE
    
        </button>                                                  
</div>