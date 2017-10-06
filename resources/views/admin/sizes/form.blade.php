<input type="hidden" name="userId" value=" {{ Auth::user()->id }}">
        <div class="input-field col s12">
        <label for="first_name">Size</label>
           {!! Form::text('size', null, ['class' => 'form-control','id'=>'brandName','required']) !!}
          
        </div>  
                      
        <div class="input-field col s12">
        <label for="first_name">Quantity</label>
           {!! Form::text('quantity', null, ['class' => 'form-control','id'=>'brandName','required']) !!}
          
        </div>  
                       
        <div class="input-field col s12">
        <label for="first_name">Reference Code</label>
           {!! Form::text('refId', null, ['class' => 'form-control','id'=>'brandName','required']) !!}
          
        </div>  
                       

<div class="right ">
<label>&nbsp;</label>
<br>
        <button class="btn btn-sm btn-primary pull-right" type="submit" name="action" id="save"><i class="fa fa-save" aria-hidden="true"></i>&nbsp;SAVE
    
        </button>        
                                            
                                          
</div>