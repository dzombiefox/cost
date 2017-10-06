<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\Engobe;
use Illuminate\Http\Request;
use Session;
use DB;
use App\model\Dengobe;
class EngobesController extends Controller
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
        $engobes = DB::table('engobes')
                ->join('sizes','sizes.size_id','=','engobes.sizeId')
                ->join('colors','color_id','=','engobes.colorId')
                ->get();
        

        return view('admin.engobes.index', compact('engobes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $engobe=DB::table('engobes')->get();
        $item=DB::table('items')->get();
        $ro = DB::table('items')->where('itemDesc', 'like', 'air%')->get();
        $size=DB::table('sizes')->get();
        $color=DB::table('colors')->get();
        return view('admin.engobes.create', compact('engobe','item','ro','size','color'));
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
                ->where('datas.name','=','ENGOBE')
                ->where('formulas.statusId','=','2')
                ->where('formulas.sizeId','=',$size)          
                ->first();
       $weight= $query->value;
       $requestData = array_merge($requestData, array("weightWet"=>$weight));   
       Engobe::create($requestData);
       $id=DB::getPdo()->lastInsertId();
       $data=array(
         'engobeId'=>$id,  
         'itemId'=>$ro ,
         'dvolume'=>$vol,
         'category'=>1  
           
       ); 
       Dengobe::create($data);
         
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
            $engobes= Engobe::distinct('engobes.engobeName')
                 ->join('dengobes','dengobes.engobeId','=','engobes.engobe_id')
                 ->join('items','items.item_id','=','dengobes.itemId')
                 ->join('costItems','costItems.itemId','=','items.item_id')
                 ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                 ->join('sizes','sizes.size_id','engobes.sizeId')
                 ->where('engobes.engobe_id','=',$id) 
                 ->select('size_id','engobe_id','engobeName','engobes.weightWet','periodes.periodeName','sizes.size','periodes.periode_id','costItems.year','quantity')
                 ->get();
       
            $details= DB::table('engobes')
                 ->join('dengobes','dengobes.engobeId','=','engobes.engobe_id')
                 ->join('items','items.item_id','=','dengobes.itemId')
                 ->join('costItems','costItems.itemId','=','items.item_id')
                 ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                 ->join('sizes','sizes.size_id','engobes.sizeId')
                 ->where('engobes.engobe_id','=',$id)       
                 ->select('items.itemCode','itemDesc','itemPrice','items.volume','dvolume','sizes.size','periodes.periode_id','costItems.year','category')
                 ->get();
            
        return view('admin.engobes.show', compact('engobes','details'));
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
        $engobe=DB::table('engobes')->get();
        $item=DB::table('items')->get();
        $ro = DB::table('items')->where('itemDesc', 'like', 'air%')->get();
        $size=DB::table('sizes')->get();
        $color=DB::table('colors')->get();
        $engobe = Engobe::findOrFail($id);
        
        $detail=DB::table('engobes')
                ->join('dengobes','dengobes.engobeId','=','engobes.engobe_id')
                ->where ('dengobes.engobeId','=',$id)
                ->first();    
        
        $dengobe= DB::table('engobes')
                 ->join('dengobes','dengobes.engobeId','=','engobes.engobe_id')
                 ->join('items','items.item_id','=','dengobes.itemId')
                 ->where('engobes.engobe_id','=',$id)       
                 ->where('category','=',0)      
                 ->get();
        return view('admin.engobes.edit', compact('engobe','item','ro','size','color','detail','dengobe'));
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
            $dengobeId=$request->dengobeId;     
            $size=$request->sizeId;
            $ro=$request->ro;
            $vol=$request->vol;  
            $requestData = $request->all();
            $query=DB::table('formulas')
                ->join('datas','datas.data_id','=','formulas.dataId')
                ->where('datas.name','=','ENGOBE')
                ->where('formulas.statusId','=','2')
                ->where('formulas.sizeId','=',$size)          
                ->first();
            $weight= $query->value;
            $requestData = array_merge($requestData, array("weightWet"=>$weight)); 
            $engobe = Engobe::findOrFail($id);
            $engobe->update($requestData);
            $data=array(
                  'engobeId'=>$id,  
                  'itemId'=>$ro ,
                  'dvolume'=>$vol,
                  'category'=>1 
                       );
            $dengobe = Dengobe::findOrFail($dengobeId);
            $dengobe->update($data);
        /*  
        $requestData = $request->all();
        
        $engobe = Engobe::findOrFail($id);
        $engobe->update($requestData);

        Session::flash('flash_message', 'Engobe updated!');

        return redirect('admin/engobes');
    */
        
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
        Engobe::destroy($id);

        Session::flash('flash_message', 'Engobe deleted!');
        return redirect('admin/engobes');
    }
    
    public function saveAll(Request $request){
        $id=$request->dengobeId;
        $engobe=$request->engobeId;
        $query=DB::table('dengobes')
                ->where('dengobes.engobeId','=',$id)
                ->where('dengobes.category','=',0)
                ->get();
        $datanya=[];
        foreach($query as $data){
                $datanya[]=array(
                'engobeId'=>$engobe,
                'itemId'=>$data->itemId,
                'dvolume'=>$data->dvolume,
                'category'=>0                
            );   
                }
        DB::table('dengobes')->insert($datanya);
        $dengobes=DB::table('dengobes')
                ->join('items','items.item_id','=','dengobes.itemId')
                ->where('dengobes.category','=',0)
                ->where('dengobes.engobeId','=',$engobe)->get();
        return $dengobes;
        
    }
    
    public static function tes(){
        return "oke";
        
    }
    
    public static function getWeightDry($id){        
        $look=DB::table('engobes')->where('engobes.engobe_id','=',$id)->first();
        $size=$look->sizeId;        
        $query=DB::table('sizes')->where ('sizes.size_id','=',$size)->first();        
        $qty=$query->quantity;
        $value=DB::table('formulas')
               ->where('formulas.sizeId','=',$size)
               ->where('formulas.dataId','=',3)
               ->where ('formulas.statusId','=',1)
               ->first();
        $val=$value->value/1000;
        $total=($qty*$val*$look->weightWet)/1000;
            return $total;
    }
    
    public static function  getCostDry($id,$periode,$year){        
         $engobes= DB::table('engobes')
                    ->join('dengobes','dengobes.engobeId','=','engobes.engobe_id')
                    ->join('items','items.item_id','=','dengobes.itemId')
                    ->join('costItems','costItems.itemId','=','items.item_id')
                    ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                    ->join('sizes','sizes.size_id','engobes.sizeId')
                    ->where('engobes.engobe_id','=',$id)       
                    ->where('costItems.periodeId',$periode)                  
                    ->where('year','=',$year) 
                    ->select('items.itemCode','itemPrice','items.volume','dvolume','sizes.size','periodes.periode_id','costItems.year','category')
                    ->get();                 
                    $totalVolume=0;  
                    $totalPrice=0;
                    $average=0;
                    $totalRo=0;
                    $totalAverage=0;
                    foreach($engobes as $item){  
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
