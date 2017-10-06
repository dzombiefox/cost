<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\Drop;
use App\model\Ddrop;
use Illuminate\Http\Request;
use Session;
use DB;
class DropsController extends Controller
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
        $drops = DB::table('drops')
                ->join('sizes','sizes.size_id','=','drops.sizeId')
                ->get();

        return view('admin.drops.index', compact('drops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $drop=DB::table('drops')->get();
        $item=DB::table('items')->get();
        $ro = DB::table('items')->where('itemDesc', 'like', 'air%')->get();
        $size=DB::table('sizes')->get();
        $color=DB::table('colors')->get();
        return view('admin.drops.create', compact('drop','item','ro','size','color'));
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
           $query=DB::table('formulas')
               ->where('formulas.sizeId','=',$size)
               ->where('formulas.dataId','=',6)
               ->where ('formulas.statusId','=',1)
               ->first();
            $weight= $query->value;
            
        $ro=$request->ro;
        $vol=$request->vol;  
        $requestData = $request->all();
        $requestData = array_merge($requestData, array("weightWet"=>$weight));   
        Drop::create($requestData);
         $id=DB::getPdo()->lastInsertId();
                $data=array(
         'dropId'=>$id,  
         'itemId'=>$ro ,
         'dvolume'=>$vol,
         'category'=>1  
           
       );
        Ddrop::create($data);
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
         $drops= Drop::distinct('drops.dropName')
                 ->join('ddrops','ddrops.dropId','=','drops.drop_id')
                 ->join('items','items.item_id','=','ddrops.itemId')
                 ->join('costItems','costItems.itemId','=','items.item_id')
                 ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                 ->join('sizes','sizes.size_id','drops.sizeId')
                 ->where('drops.drop_id','=',$id) 
                 ->select('size_id','drop_id','dropName','drops.weightWet','periodes.periodeName','sizes.size','periodes.periode_id','costItems.year','quantity')
                 ->get();
      
            $details= DB::table('drops')
                 ->join('ddrops','ddrops.dropId','=','drops.drop_id')
                 ->join('items','items.item_id','=','ddrops.itemId')
                 ->join('costItems','costItems.itemId','=','items.item_id')
                 ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                 ->join('sizes','sizes.size_id','drops.sizeId')
                 ->where('drops.drop_id','=',$id)       
                 ->select('items.itemCode','itemDesc','itemPrice','items.volume','dvolume','sizes.size','periodes.periode_id','costItems.year','category')
                 ->get();
            return view('admin.drops.show', compact('drops','details'));
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
        $drop=DB::table('drops')->get();
        $item=DB::table('items')->get();
        $ro = DB::table('items')->where('itemDesc', 'like', 'air%')->get();
        $size=DB::table('sizes')->get();
        $color=DB::table('colors')->get();
        $drop = Drop::findOrFail($id);
        $detail=DB::table('drops')
                ->join('ddrops','ddrops.dropId','=','drops.drop_id')
                ->where ('ddrops.dropId','=',$id)
                ->first();   
         $ddrop= DB::table('drops')
                 ->join('ddrops','ddrops.dropId','=','drops.drop_id')
                 ->join('items','items.item_id','=','ddrops.itemId')
                 ->where('drops.drop_id','=',$id)       
                 ->where('category','=',0)      
                 ->get();
        return view('admin.drops.edit', compact('drop','size','ro','item','color','detail','ddrop'));
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
            $ddropId=$request->ddropId;     
            $size=$request->sizeId;
            $ro=$request->ro;
            $vol=$request->vol;  
            $requestData = $request->all();
            $query=DB::table('formulas')
                ->join('datas','datas.data_id','=','formulas.dataId')
                ->where('datas.name','=','DROP')
                ->where('formulas.statusId','=','1')
                ->where('formulas.sizeId','=',$size)          
                ->first();            
            
            $weight= $query->value;
            $requestData = array_merge($requestData, array("weightWet"=>$weight)); 
            $drop = Drop::findOrFail($id);
            $drop->update($requestData);
            $data=array(
                  'dropId'=>$id,  
                  'itemId'=>$ro ,
                  'dvolume'=>$vol,
                  'category'=>1 
                       );
            $ddrop = Ddrop::findOrFail($ddropId);
            $ddrop->update($data);
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
        Drop::destroy($id);

        Session::flash('flash_message', 'Drop deleted!');

        return redirect('admin/drops');
    }
    
       public function saveAll(Request $request){
        $id=$request->ddropId;
        $drop=$request->dropId;
        $query=DB::table('ddrops')
                ->where('ddrops.dropId','=',$id)
                ->where('ddrops.category','=',0)
                ->get();
        $datanya=[];
        foreach($query as $data){
                $datanya[]=array(
                'dropId'=>$drop,
                'itemId'=>$data->itemId,
                'dvolume'=>$data->dvolume,
                'category'=>0                
            );   
                }
        DB::table('ddrops')->insert($datanya);
        $ddrops=DB::table('ddrops')
                ->join('items','items.item_id','=','ddrops.itemId')
                ->where('ddrops.category','=',0)
                ->where('ddrops.dropId','=',$drop)->get();
        return $ddrops;
        
    }
    
     public static function  getCostDry($id,$periode,$year){     
         if($id==0){
             return 0;
         }
         else{
                $drops= DB::table('drops')
                    ->join('ddrops','ddrops.dropId','=','drops.drop_id')
                    ->join('items','items.item_id','=','ddrops.itemId')
                    ->join('costItems','costItems.itemId','=','items.item_id')
                    ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                    ->join('sizes','sizes.size_id','drops.sizeId')
                    ->where('drops.drop_id','=',$id)       
                    ->where('costItems.periodeId',$periode)                  
                    ->where('year','=',$year) 
                    ->select('items.itemCode','itemPrice','items.volume','dvolume','sizes.size','periodes.periode_id','costItems.year','category')
                    ->get();     
         
                    $totalVolume=0;  
                    $totalPrice=0;
                    $average=0;
                    $totalRo=0;
                    $totalAverage=0;
                    foreach($drops as $item){  
                        if($item->category==0){
                         $totalVolume+=$item->dvolume; 
                         $totalPrice+=round(($item->dvolume/100)*$item->itemPrice,2);
                         
                        }else{
                               if(count($item) > 0)
                        {
                            $totalRo=($item->itemPrice*$item->dvolume)/100; 
                            //$totalAverage=$totalRo+$item->dvolume;
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
                      return $totalAverage*self::getWeightDry($id);     
         }

    }
    
     public static function getWeightDry($id){              
        $look=DB::table('drops')->where('drops.drop_id','=',$id)->first();
        $size=$look->sizeId;        
        $query=DB::table('sizes')->where ('sizes.size_id','=',$size)->first();        
        $qty=$query->quantity;
        $value=DB::table('formulas')
               ->where('formulas.sizeId','=',$size)
               ->where('formulas.dataId','=',6)
               ->where ('formulas.statusId','=',2)
               ->first();
        $val=$value->value;
        $total=($qty*$val*$look->weightWet)/1000;
            return $total;
    }
}
