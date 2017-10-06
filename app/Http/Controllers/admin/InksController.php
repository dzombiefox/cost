<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\Ink;
use Illuminate\Http\Request;
use Session;
use DB;
class InksController extends Controller
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
        $inks = DB::table('inks')
                ->join('sizes','sizes.size_id','=','inks.sizeId')
                ->join('colors','colors.color_id','=','inks.colorId')
                ->get();

        return view('admin.inks.index', compact('inks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $ink=DB::table('inks')->get();
        $item=DB::table('items')->get();
        $size=DB::table('sizes')->get();
        $color=DB::table('colors')->get();
        return view('admin.inks.create', compact('ink','item','size','color'));
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
        
        Ink::create($requestData);

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
            $inks= Ink::distinct('inks.inkName')
                 ->join('dinks','dinks.inkId','=','inks.ink_id')
                 ->join('items','items.item_id','=','dinks.itemId')
                 ->join('costItems','costItems.itemId','=','items.item_id')
                 ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                 ->join('sizes','sizes.size_id','inks.sizeId')
                 ->where('inks.ink_id','=',$id) 
                 ->select('size_id','ink_id','inkName','periodes.periodeName','sizes.size','periodes.periode_id','costItems.year','quantity')
                 ->get();
           
            $details= DB::table('inks')
                         ->join('dinks','dinks.inkId','=','inks.ink_id')
                         ->join('items','items.item_id','=','dinks.itemId')
                         ->join('costItems','costItems.itemId','=','items.item_id')
                         ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                         ->join('sizes','sizes.size_id','inks.sizeId')
                         ->where('inks.ink_id','=',$id)       
                         ->select('items.itemCode','itemDesc','itemPrice','items.volume','dvolume','sizes.size','periodes.periode_id','costItems.year')
                         ->get();
         
      
        return view('admin.inks.show', compact('inks','details'));
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
        $ink = Ink::findOrFail($id);
            
        $detail=DB::table('inks')
                ->join('dinks','dinks.inkId','=','inks.ink_id')
                ->where ('dinks.inkId','=',$id)
                ->first();    
        
        $dink= DB::table('inks')
                 ->join('dinks','dinks.inkId','=','inks.ink_id')
                 ->join('items','items.item_id','=','dinks.itemId')
                 ->where('inks.ink_id','=',$id)       
                     
                 ->get();
        return view('admin.inks.edit', compact('ink','item','size','color','detail','dink'));
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
        
        $ink = Ink::findOrFail($id);
        $ink->update($requestData);

        Session::flash('flash_message', 'Ink updated!');

        return redirect('admin/inks');
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
        Ink::destroy($id);

        Session::flash('flash_message', 'Ink deleted!');

        return redirect('admin/inks');
    }
    public function saveAll(Request $request){
        $id=$request->dinkId;
        $ink=$request->inkId;
        $query=DB::table('dinks')
                ->where('dinks.inkId','=',$id)               
                ->get();
        $datanya=[];
        foreach($query as $data){
                $datanya[]=array(
                'inkId'=>$ink,
                'itemId'=>$data->itemId,
                'dvolume'=>$data->dvolume
                           
            );   
                }
        DB::table('dinks')->insert($datanya);
        $dinks=DB::table('dinks')
                ->join('items','items.item_id','=','dinks.itemId')
                ->where('dinks.inkId','=',$ink)->get();
        return $dinks;
        
    }
    
    public static function  getCostDry($id,$periode,$year){     
         $ink=DB::table('inks')
                ->join('sizes','sizes.size_id','=','inks.sizeId')
                ->where('ink_id','=',$id)
                ->first();
         
         $inks= DB::table('inks')
                    ->join('dinks','dinks.inkId','=','inks.ink_id')
                    ->join('items','items.item_id','=','dinks.itemId')
                    ->join('costItems','costItems.itemId','=','items.item_id')
                    ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                    ->join('sizes','sizes.size_id','inks.sizeId')
                    ->where('inks.ink_id','=',$id)       
                    ->where('costItems.periodeId',$periode)                  
                    ->where('year','=',$year) 
                    ->get();                 
                    $totalVolume=0;  
                    $totalPrice=0;
                    
                    
                    foreach($inks as $item){                       
                        if(count($item) > 0)
                        {
                         $totalVolume+=$item->dvolume; 
                         $totalPrice+=round(($item->dvolume/1000)*$item->itemPrice,2);
                         $average=$totalPrice/1000*$totalVolume;
                        }
                        else   
                        {
                             $totalVolume=0; 
                             $totalPrice=0;
                            
                        }                           
                       
                       } 
                      return round($totalPrice,2);        

    }
}
