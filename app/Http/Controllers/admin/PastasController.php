<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\Pasta;
use Illuminate\Http\Request;
use Session;
use DB;
class PastasController extends Controller
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
        $pastas =DB::table('pastas')
                ->join('sizes','sizes.size_id','=','pastas.sizeId')
                ->join('colors','colors.color_id','=','pastas.colorId')
                ->get()
                ;

        return view('admin.pastas.index', compact('pastas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $pasta=DB::table('pastas')->get();
        $item=DB::table('items')->get();
        $size=DB::table('sizes')->get();
        $color=DB::table('colors')->get();
        return view('admin.pastas.create', compact('item','size','color','pasta'));
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
        
        $requestData = $request->all();
        
        Pasta::create($requestData);
        $id=DB::getPdo()->lastInsertId();
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
      $pastas= Pasta::distinct('pastas.pastaName')
                 ->join('dpastas','dpastas.pastaId','=','pastas.pasta_id')
                 ->join('items','items.item_id','=','dpastas.itemId')
                 ->join('costItems','costItems.itemId','=','items.item_id')
                 ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                 ->join('sizes','sizes.size_id','pastas.sizeId')
                 ->where('pastas.pasta_id','=',$id) 
                 ->select('size_id','pasta_id','pastaName','pastas.weightWet','periodes.periodeName','sizes.size','periodes.periode_id','costItems.year','quantity')
                 ->get();
    $details= DB::table('pastas')
                 ->join('dpastas','dpastas.pastaId','=','pastas.pasta_id')
                 ->join('items','items.item_id','=','dpastas.itemId')
                 ->join('costItems','costItems.itemId','=','items.item_id')
                 ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                 ->join('sizes','sizes.size_id','pastas.sizeId')
                 ->where('pastas.pasta_id','=',$id)       
                 ->select('items.itemCode','itemDesc','itemPrice','items.volume','dvolume','sizes.size','periodes.periode_id','costItems.year')
                 ->get();
         
        return view('admin.pastas.show', compact('pastas','details'));
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
        $size=DB::table('sizes')->get();
        $color=DB::table('colors')->get();
        $pasta = Pasta::findOrFail($id);
            
        $detail=DB::table('pastas')
                ->join('dpastas','dpastas.pastaId','=','pastas.pasta_id')
                ->where ('dpastas.pastaId','=',$id)
                ->first();    
        
        $dpasta= DB::table('pastas')
                 ->join('dpastas','dpastas.pastaId','=','pastas.pasta_id')
                 ->join('items','items.item_id','=','dpastas.itemId')
                 ->where('pastas.pasta_id','=',$id)       
                     
                 ->get();
        return view('admin.pastas.edit', compact('pasta','item','size','color','detail','dpasta'));
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
        
        $requestData = $request->all();
        
        $pasta = Pasta::findOrFail($id);
        $pasta->update($requestData);

        Session::flash('flash_message', 'Pasta updated!');

        return redirect('admin/pastas');
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
        Pasta::destroy($id);

        Session::flash('flash_message', 'Pasta deleted!');

        return redirect('admin/pastas');
    }
    
    public function saveAll(Request $request){
        $id=$request->dpastaId;
        $pasta=$request->pastaId;
        $query=DB::table('dpastas')
                ->where('dpastas.pastaId','=',$id)               
                ->get();
        $datanya=[];
        foreach($query as $data){
                $datanya[]=array(
                'pastaId'=>$pasta,
                'itemId'=>$data->itemId,
                'dvolume'=>$data->dvolume
                           
            );   
                }
        DB::table('dpastas')->insert($datanya);
        $ddrops=DB::table('dpastas')
                ->join('items','items.item_id','=','dpastas.itemId')
                ->where('dpastas.pastaId','=',$pasta)->get();
        return $ddrops;
        
    }
    
    public static function getWeightDry($id){        
        $look=DB::table('pastas')->where('pastas.pasta_id','=',$id)->first();
        $size=$look->sizeId;        
        $query=DB::table('sizes')->where ('sizes.size_id','=',$size)->first();        
        $qty=$query->quantity;        
        $weightWet=$look->weightWet;        
        $total=$weightWet*$qty/1000;
        return $total;
    }
     public static function  getCostDry($id,$periode,$year){     
         $pastas= DB::table('pastas')
                    ->join('dpastas','dpastas.pastaId','=','pastas.pasta_id')
                    ->join('items','items.item_id','=','dpastas.itemId')
                    ->join('costItems','costItems.itemId','=','items.item_id')
                    ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                    ->join('sizes','sizes.size_id','pastas.sizeId')
                    ->where('pastas.pasta_id','=',$id)       
                    ->where('costItems.periodeId',$periode)                  
                    ->where('year','=',$year) 
                    ->get();                 
                    $totalVolume=0;  
                    $totalPrice=0;
                    $average=0;
                    
                    foreach($pastas as $item){                       
                        if(count($item) > 0)
                        {
                         $totalVolume+=$item->dvolume; 
                         $totalPrice+=round(($item->dvolume/100)*$item->itemPrice,2);
                         $average=$totalPrice/100*$totalVolume;
                        }
                        else   
                        {
                             $totalVolume=0; 
                             $totalPrice=0;
                             $average=0;
                        }                           
                       
                       } 
                      return round($average*self::getWeightDry($id),2);        

    }
}
