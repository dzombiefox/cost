<?php

namespace App\Http\Controllers\admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\lib\formulaBody;
use App\model\Body;
use App\model\Dbody;
use Illuminate\Http\Request;
use Session;
use DB;
class BodysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
  /*      $dbodys=DB::table('dbodys')
            ->join('items','items.item_id','=','dbodys.itemId')
        ->get();
        foreach($dbodys as $data){
            
            $h2O=$data->volume;
            $id=$data->dbody_id;
           
            $da= array(
                'dbody_id'=>$id,
                'h2O'=>$h2O
                );
*/
         //  $dbody=Dbody::findOrFail($id);
        //  echo $dbody;
           //$dbody->update($da);
//            Dbody::where('dbody_id', '=', 546)
// ->update(['h2O' => $h2O]);

        //}
        //return $dbodys;
 $bodys=DB::table('bodys')
       ->join('sizes','sizes.size_id','bodys.sizeId')
        ->get();
       $bodys= Body::distinct('bodys.bodyName')
                 ->join('dbodys','dbodys.bodyId','=','bodys.body_id')
                 ->join('items','items.item_id','=','dbodys.itemId')
                 ->join('costItems','costItems.itemId','=','items.item_id')
                 ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                 ->join('sizes','sizes.size_id','bodys.sizeId')
                 ->select('body_id','bodyName','bodys.weightPcs','choose','sizes.size','costItems.year')
                 ->get();
     
     // return $bodys;
  
     return view('admin.bodys.index', compact('bodys'));
        /*
     
        
       return $body;*/
      
       /* $bodys = Body::paginate(25);

        return view('admin.bodys.index', compact('bodys'));
    */}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $body=DB::table('bodys')->get();
        $item=DB::table('items')->get();
        $ro = DB::table('items')->where('itemDesc', 'like', 'air%')->get();
        $size=DB::table('sizes')->get();
        $periode=DB::table('periodes')->get();
        return view('admin.bodys.create', compact('size','periode','item','ro','body'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {     
   $size=$request->sizeId;
   $ro=$request->ro;
   $vol=$request->vol;  
   $requestData = $request->all();
   $query=DB::table('formulas')
                ->join('datas','datas.data_id','=','formulas.dataId')
                ->where('datas.name','=','BODY')
                ->where('formulas.statusId','=','1')
                ->where('formulas.sizeId','=',$size)          
                ->first();
        $weight= $query->value;
        $requestData = array_merge($requestData, array("weightPcs"=>$weight));        
        Body::create($requestData);
        $id=DB::getPdo()->lastInsertId();
        $data=array(
         'bodyId'=>$id,  
         'itemId'=>$ro ,
         'dvolume'=>$vol,
         'category'=>1  
           
       ); 
       Dbody::create($data);
         
         return $id;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
       $bodys= Body::distinct('bodys.bodyName')
                 ->join('dbodys','dbodys.bodyId','=','bodys.body_id')
                 ->join('items','items.item_id','=','dbodys.itemId')
                 ->join('costItems','costItems.itemId','=','items.item_id')
                 ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                 ->join('sizes','sizes.size_id','bodys.sizeId')
                 ->where('bodys.body_id','=',$id) 
                 ->select('body_id','bodyName','bodys.weightPcs','periodes.periodeName','choose','sizes.size','periodes.periode_id','costItems.year','quantity')
                 ->get();
       
       $details= DB::table('bodys')
                 ->join('dbodys','dbodys.bodyId','=','bodys.body_id')
                 ->join('items','items.item_id','=','dbodys.itemId')
                 ->join('costItems','costItems.itemId','=','items.item_id')
                 ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                 ->join('sizes','sizes.size_id','bodys.sizeId')
                 ->where('bodys.body_id','=',$id)       
                 ->select('items.itemCode','itemDesc','itemPrice','dvolume','h2O','choose','sizes.size','periodes.periode_id','costItems.year','category')
                 ->get();
             
        return view('admin.bodys.show', compact('bodys','details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $item=DB::table('items')->get();
        $ro = DB::table('items')->where('itemDesc', 'like', 'air%')->get();
        $size=DB::table('sizes')->get();
        $periode=DB::table('periodes')->get();
        $body = Body::findOrFail($id);
        $detail=DB::table('bodys')
                ->join('dbodys','dbodys.bodyId','=','bodys.body_id')
                ->where ('dbodys.bodyId','=',$id)
                ->first();      
     
              $dbody= DB::table('bodys')
                 ->join('dbodys','dbodys.bodyId','=','bodys.body_id')
                 ->join('items','items.item_id','=','dbodys.itemId')
                // ->join('costItems','costItems.itemId','=','items.item_id')
                 //->join('periodes','periodes.periode_id','=','costItems.periodeId')
                 //->join('sizes','sizes.size_id','bodys.sizeId')
                 ->where('bodys.body_id','=',$id)       
             
                 ->where('category','=',0)      
             //    ->select('items.itemCode','itemPrice','items.volume','dvolume','choose','sizes.size','periodes.periode_id','costItems.year','category')
                 ->get();
              
        return view('admin.bodys.edit', compact('body','item','ro','size','periode','detail','dbody'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
            $dbodyId=$request->dbodyId;     
            $size=$request->sizeId;
            $ro=$request->ro;
            $vol=$request->vol;  
            $requestData = $request->all();
            $query=DB::table('formulas')
                         ->join('datas','datas.data_id','=','formulas.dataId')
                         ->where('datas.name','=','BODY')
                         ->where('formulas.statusId','=','1')
                         ->where('formulas.sizeId','=',$size)          
                         ->first();
                 
            $weight= $query->value;
            $requestData = array_merge($requestData, array("weightPcs"=>$weight));        
            $body = Body::findOrFail($id);
            $body->update($requestData);
                 $data=array(
                  'bodyId'=>$id,  
                  'itemId'=>$ro ,
                  'dvolume'=>$vol,
                  'category'=>1  

                ); 
               $dbody = Dbody::findOrFail($dbodyId);
               $dbody->update($data);
             
      }
      

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Body::destroy($id);

        Session::flash('flash_message', 'Body deleted!');

        return redirect('admin/bodys');
    }
    
 /*   public function getCombo($id){
        $data=DB::table('bodys')->get();
        return $data;
        
    }*/
    
    
    public function getDetail($id,$periode,$year){
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
                 return $bodys;
    }
    
    
    public function getDetailRo($id,$periode,$year){
            $bodys= DB::table('bodys')
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
                 ->get();
                 return $bodys;
        
    }
    
    public function saveAll(Request $request){
        $id=$request->dbodyId;
        $body=$request->bodyId;
        $query=DB::table('dbodys')
                ->where('dbodys.bodyId','=',$id)
                ->where('dbodys.category','=',0)
                ->get();
        $datanya=[];
        foreach($query as $data){
                $datanya[]=array(
                'bodyId'=>$body,
                'itemId'=>$data->itemId,
                'dvolume'=>$data->dvolume,
                'h2O'=>$data->h2O,
                'category'=>0                
            );   
                }
        DB::table('dbodys')->insert($datanya);
        $dbodys=DB::table('dbodys')
                ->join('items','items.item_id','=','dbodys.itemId')
                ->where('dbodys.category','=',0)
                ->where('dbodys.bodyId','=',$body)->get();
        return $dbodys;
        
    }
    
public static function getWeightDry($id){        
        $look=DB::table('bodys')->where('bodys.body_id','=',$id)->first();
        $size=$look->sizeId;        
        $query=DB::table('sizes')->where ('sizes.size_id','=',$size)->first();        
        $qty=$query->quantity;        
        $weightPcs=$look->weightPcs;        
            return $qty*$weightPcs/1000;
    }
public static function getPrice($id,$periode,$year){
        $bodys= DB::table('bodys')
                    ->join('dbodys','dbodys.bodyId','=','bodys.body_id')
                    ->join('items','items.item_id','=','dbodys.itemId')
                    ->join('costItems','costItems.itemId','=','items.item_id')
                    ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                    ->join('sizes','sizes.size_id','bodys.sizeId')
                    ->where('bodys.body_id','=',$id)       
                    ->where('costItems.periodeId',$periode)                  
                    ->where('year','=',$year)                  
                    ->select('items.itemCode','itemPrice','h2O','dvolume','choose','sizes.size','periodes.periode_id','costItems.year','category')
                    ->get();        
                    $totalVolume=0;  
                    $totalPrice=0;
                    $average=0;
                    $totalRo=0;
                    $totalAverage=0;
                    foreach($bodys as $item){  
                        if($item->category==0){
                         $totalVolume+=$item->dvolume; 
                         $totalPrice+=round($item->itemPrice/((100-$item->h2O)/100)*$item->dvolume,2)/100;                        
                         
                        }else{
                               if(count($item) > 0)
                        {
                            $totalRo=($item->itemPrice*$item->dvolume)/100; 
                           
                        }
                        else   if($item->category==1)
                        {
                            $totalRo=0;
                            $totalAverage=0;
                        }                           
                        }
                       }
                        $average=$totalPrice*100/$totalVolume;
                        $totalAverage=round($average,2)+$totalRo;
                   return round($totalAverage*self::getWeightDry($id),2);    
   }
}
