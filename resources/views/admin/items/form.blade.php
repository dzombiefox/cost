<div class="box-body">
<div class="box-body">

<div class="row">
    <div class="input-field col s12">
     <label class="active" for="first_name2">ITEM CODE</label>
     {!! Form::text('itemCode', null, ['class' => 'form-control','required']) !!}
     
    </div>    
</div> 
<div class="row">
    <div class="input-field col s12">
    <label class="active" for="first_name2">ITEM NAME</label>
       {!! Form::text('itemName', null, ['class' => 'form-control','required']) !!}
      
    </div>
</div>
<div class="row">
    <div class="input-field col s12">
    <label class="active" for="first_name2">VOLUME</label>
       {!! Form::text('volume', null, ['class' => 'form-control','required']) !!}
      
    </div>
</div>
<div class="row">
     <div class="input-field col s12">
     <label class="active" for="first_name2">ITEM DESC</label>
    {!! Form::text('itemDesc', null, ['class' => 'form-control','required']) !!}
      
    </div>
</div>

  <div class="row">
    
      <div class="input-field col s12">
      <label class="active" for="first_name2">COLOR</label>
    {!! Form::text('color', null, ['class' => 'form-control','required']) !!}
      
      </div>
  </div>  

  <div class="row">  
  <label>&nbsp;</label>
<div class="right ">
        <button class="btn btn-sm btn-primary pull-right" type="submit" name="action" id="save"><i class="fa fa-save" aria-hidden="true"></i>&nbsp;SAVE
    
        </button>        
                                            
                                          
</div>
</div>
    





</div>
</div>

