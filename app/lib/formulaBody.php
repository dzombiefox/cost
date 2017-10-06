<?php

namespace app\lib;
use DB;

class formulaBody{
    public function __construct() {
       
    }
    public static function getPrice($id,$periode,$year){
        $body=DB::table('bodys')
                ->join('sizes','sizes.size_id','=','bodys.sizeId')
                ->where('body_id','=',$id)
                ->first();
        
        $bodys= DB::table('bodys')
                    ->join('dbodys','dbodys.bodyId','=','bodys.body_id')
                    ->join('items','items.item_id','=','dbodys.itemId')
                    ->join('costItems','costItems.itemId','=','items.item_id')
                    ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                    ->join('sizes','sizes.size_id','bodys.sizeId')
                    ->where('bodys.body_id','=',$id)       
                    ->where('costItems.periodeId',$periode)                  
                    ->where('year','=',$year) 
                    ->where('category','=',0)      
                    ->select('items.itemCode','itemPrice','items.volume','dvolume','choose','sizes.size','periodes.periode_id','costItems.year','category')
                    ->get();
        
                    $totalVolume=0;  
                    $totalPriceDry=0;
                    $totalPrice=0;
                    foreach($bodys as $item){        
                         $totalVolume+=$item->dvolume; 
                         $totalPrice+=round($item->itemPrice/((100-$item->volume)/100)*$item->dvolume,2)/100;
                                            }         
   $ro= DB::table('bodys')
                 ->join('dbodys','dbodys.bodyId','=','bodys.body_id')
                 ->join('items','items.item_id','=','dbodys.itemId')
                 ->join('costItems','costItems.itemId','=','items.item_id')
                 ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                 ->join('sizes','sizes.size_id','bodys.sizeId')
                 ->where('bodys.body_id','=',$id)       
                 ->where('costItems.periodeId',$periode)                  
                 ->where('year','=',$year) 
                 ->where('category','=',1)      
                 ->select('items.itemCode','itemPrice','items.volume','dvolume','choose','sizes.size','periodes.periode_id','costItems.year','category')
                 ->first();   
  
   $average=round($totalPrice*100/$totalVolume,2);
   $totalRo=0;
   if(count($ro) > 0)
        {
           $totalRo=round(($ro->dvolume*$ro->itemPrice)/100,2);
        }
        else
        {
            $totalRo=0;
        }
   $totalAverage=round($totalRo+$average,2);
   $weightPcs=$body->weightPcs/1000;
   $qty=$body->quantity;
   $dry=$qty*$weightPcs;
   $costDry=round($dry+$totalAverage,2);
   echo $costDry;
   }
    
}