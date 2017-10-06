<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\Glaze;
use App\model\Dglaze;
use Illuminate\Http\Request;
use Session;
use DB;
class GlazesController extends Controller
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
        $glazes = DB::table('glazes')
                ->join('sizes','sizes.size_id','=','glazes.sizeId')
                ->join('colors','colors.color_id','=','glazes.colorId')
                ->get();

        return view('admin.glazes.index', compact('glazes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $glaze=DB::table('glazes')->get();
        $item=DB::table('items')->get();
        $ro = DB::table('items')->where('itemDesc', 'like', 'air%')->get();
        $size=DB::table('sizes')->get();
        $color=DB::table('colors')->get();
        return view('admin.glazes.create', compact('glaze','item','ro','size','color'));
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
                ->where('datas.name','=','GLAZE')
                ->where('formulas.statusId','=','2')
                ->where('formulas.sizeId','=',$size)          
                ->first();
         $weight= $query->value;
         $requestData = array_merge($requestData, array("weightWet"=>$weight));   
         Glaze::create($requestData);
         $id=DB::getPdo()->lastInsertId();
                $data=array(
         'glazeId'=>$id,  
         'itemId'=>$ro ,
         'dvolume'=>$vol,
         'category'=>1  
           
       );
        Dglaze::create($data);
        return $id;
        
       /* $requestData = $request->all();
        
        Glaze::create($requestData);

        Session::flash('flash_message', 'Glaze added!');

        return redirect('admin/glazes');
        * 
        */
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
            $glazes= Glaze::distinct('glazes.glazeName')
                 ->join('dglazes','dglazes.glazeId','=','glazes.glaze_id')
                 ->join('items','items.item_id','=','dglazes.itemId')
                 ->join('costItems','costItems.itemId','=','items.item_id')
                 ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                 ->join('sizes','sizes.size_id','glazes.sizeId')
                 ->where('glazes.glaze_id','=',$id) 
                 ->select('size_id','glaze_id','glazeName','glazes.weightWet','periodes.periodeName','sizes.size','periodes.periode_id','costItems.year','quantity')
                 ->get();
      
            $details= DB::table('glazes')
                 ->join('dglazes','dglazes.glazeId','=','glazes.glaze_id')
                 ->join('items','items.item_id','=','dglazes.itemId')
                 ->join('costItems','costItems.itemId','=','items.item_id')
                 ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                 ->join('sizes','sizes.size_id','glazes.sizeId')
                 ->where('glazes.glaze_id','=',$id)       
                 ->select('items.itemCode','itemDesc','itemPrice','items.volume','dvolume','sizes.size','periodes.periode_id','costItems.year','category')
                 ->get();
         
        return view('admin.glazes.show', compact('glazes','details'));
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
        $glaze=DB::table('glazes')->get();
        $item=DB::table('items')->get();
        $ro = DB::table('items')->where('itemDesc', 'like', 'air%')->get();
        $size=DB::table('sizes')->get();
        $color=DB::table('colors')->get();
        $glaze = Glaze::findOrFail($id);
        
        $detail=DB::table('glazes')
                ->join('dglazes','dglazes.glazeId','=','glazes.glaze_id')
                ->where ('dglazes.glazeId','=',$id)
                ->first();    
        
        $dglaze= DB::table('glazes')
                 ->join('dglazes','dglazes.glazeId','=','glazes.glaze_id')
                 ->join('items','items.item_id','=','dglazes.itemId')
                 ->where('glazes.glaze_id','=',$id)       
                 ->where('category','=',0)      
                 ->get();
        return view('admin.glazes.edit', compact('glaze','item','ro','size','color','detail','dglaze'));
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
            $dglazeId=$request->dglazeId;     
            $size=$request->sizeId;
            $ro=$request->ro;
            $vol=$request->vol;  
            $requestData = $request->all();
            $query=DB::table('formulas')
                ->join('datas','datas.data_id','=','formulas.dataId')
                ->where('datas.name','=','GLAZE')
                ->where('formulas.statusId','=','2')
                ->where('formulas.sizeId','=',$size)          
                ->first();
            $weight= $query->value;
            $requestData = array_merge($requestData, array("weightWet"=>$weight)); 
            $glaze = Glaze::findOrFail($id);
            $glaze->update($requestData);
            $data=array(
                  'glazeId'=>$id,  
                  'itemId'=>$ro ,
                  'dvolume'=>$vol,
                  'category'=>1 
                       );
            $dglaze = Dglaze::findOrFail($dglazeId);
            $dglaze->update($data);
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
        Glaze::destroy($id);

        Session::flash('flash_message', 'Glaze deleted!');

        return redirect('admin/glazes');
    }
     public function saveAll(Request $request){
        $id=$request->dglazeId;
        $glaze=$request->glazeId;
        $query=DB::table('dglazes')
                ->where('dglazes.glazeId','=',$id)
                ->where('dglazes.category','=',0)
                ->get();
        $datanya=[];
        foreach($query as $data){
                $datanya[]=array(
                'glazeId'=>$glaze,
                'itemId'=>$data->itemId,
                'dvolume'=>$data->dvolume,
                'category'=>0                
            );   
                }
        DB::table('dglazes')->insert($datanya);
        $dglazes=DB::table('dglazes')
                ->join('items','items.item_id','=','dglazes.itemId')
                ->where('dglazes.category','=',0)
                ->where('dglazes.glazeId','=',$glaze)->get();
        return $dglazes;
        
    }
    
        public static function getWeightDry($id){        
        $look=DB::table('glazes')->where('glazes.glaze_id','=',$id)->first();
        $size=$look->sizeId;        
        $query=DB::table('sizes')->where ('sizes.size_id','=',$size)->first();        
        $qty=$query->quantity;
        $value=DB::table('formulas')
               ->where('formulas.sizeId','=',$size)
               ->where('formulas.dataId','=',2)
               ->where ('formulas.statusId','=',1)
               ->first();
        $val=$value->value/1000;
        $total=($qty*$val*$look->weightWet)/1000;
            return $total;
    }
    
     public static function  getCostDry($id,$periode,$year){     
               $glazes= DB::table('glazes')
                    ->join('dglazes','dglazes.glazeId','=','glazes.glaze_id')
                    ->join('items','items.item_id','=','dglazes.itemId')
                    ->join('costItems','costItems.itemId','=','items.item_id')
                    ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                    ->join('sizes','sizes.size_id','glazes.sizeId')
                    ->where('glazes.glaze_id','=',$id)       
                    ->where('costItems.periodeId',$periode)                  
                    ->where('year','=',$year) 
                    ->select('items.itemCode','itemPrice','items.volume','dvolume','sizes.size','periodes.periode_id','costItems.year','category')
                    ->get();                 
                    $totalVolume=0;  
                    $totalPrice=0;
                    $average=0;
                    $totalRo=0;
                    $totalAverage=0;
                    foreach($glazes as $item){  
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
                      return $totalAverage+self::getWeightDry($id);        

    }
}
