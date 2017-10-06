<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\Size;
use App\model\Alumina;
use Illuminate\Http\Request;
use Session;
use DB;
class AluminasController extends Controller
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
        $aluminas = DB::table('aluminas')
                ->join('sizes','sizes.size_id','=','aluminas.sizeId')
                ->get();
      

        return view('admin.aluminas.index', compact('aluminas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $alumina=DB::table('aluminas')->get();
        $item=DB::table('items')->get();
        $size=DB::table('sizes')->get();
        return view('admin.aluminas.create', compact('size','item','alumina'));
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
        Alumina::create($requestData);
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
              $aluminas= Alumina::distinct('aluminas.aluminaName')
                 ->join('daluminas','daluminas.aluminaId','=','aluminas.alumina_id')
                 ->join('items','items.item_id','=','daluminas.itemId')
                 ->join('costItems','costItems.itemId','=','items.item_id')
                 ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                 ->join('sizes','sizes.size_id','aluminas.sizeId')
                 ->where('aluminas.alumina_id','=',$id) 
                 ->select('alumina_id','aluminaName','aluminas.weightPcs','periodes.periodeName','sizes.size','periodes.periode_id','costItems.year','quantity')
                 ->get();
              $details= DB::table('aluminas')
                 ->join('daluminas','daluminas.aluminaId','=','aluminas.alumina_id')
                 ->join('items','items.item_id','=','daluminas.itemId')
                 ->join('costItems','costItems.itemId','=','items.item_id')
                 ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                 ->join('sizes','sizes.size_id','aluminas.sizeId')
                 ->where('aluminas.alumina_id','=',$id)       
                 ->select('items.itemCode','itemDesc','itemPrice','items.volume','dvolume','sizes.size','periodes.periode_id','costItems.year')
                 ->get();
              
        return view('admin.aluminas.show', compact('aluminas','details'));
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
         //$alumina=DB::table('aluminas')->get();
        $item=DB::table('items')->get();
        $size=DB::table('sizes')->get();
        $alumina = Alumina::findOrFail($id);
        $dalumina= DB::table('aluminas')
                 ->join('daluminas','daluminas.aluminaId','=','aluminas.alumina_id')
                 ->join('items','items.item_id','=','daluminas.itemId')
                 ->where('aluminas.alumina_id','=',$id)       
                 ->get();
        return view('admin.aluminas.edit', compact('alumina','size','dalumina','item'));
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
        
        $alumina = Alumina::findOrFail($id);
        $alumina->update($requestData);

        Session::flash('flash_message', 'Alumina updated!');

        return redirect('admin/aluminas');
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
        Alumina::destroy($id);

        Session::flash('flash_message', 'Alumina deleted!');

        return redirect('admin/aluminas');
    }
    
    public function saveAll(Request $request){
        $id=$request->daluminaId;
        $alumina=$request->aluminaId;
        $query=DB::table('daluminas')
                ->where('daluminas.aluminaId','=',$id)
                ->get();
        $datanya=[];
        foreach($query as $data){
                $datanya[]=array(
                'aluminaId'=>$alumina,
                'itemId'=>$data->itemId,
                'dvolume'=>$data->dvolume,
                     
            );   
                }
        DB::table('daluminas')->insert($datanya);
        $daluminas=DB::table('daluminas')
                ->join('items','items.item_id','=','daluminas.itemId')                
                ->where('daluminas.aluminaId','=',$alumina)->get();
        return $daluminas;
        
    }
    public static function getPrice($id,$periode,$year){
                $data=Alumina::findOrFail($id);
                $size=$data->sizeId;
                $getSize=Size::findOrFail($size);
                $aluminas= DB::table('aluminas')
                    ->join('daluminas','daluminas.aluminaId','=','aluminas.alumina_id')
                    ->join('items','items.item_id','=','daluminas.itemId')
                    ->join('costItems','costItems.itemId','=','items.item_id')
                    ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                    ->join('sizes','sizes.size_id','aluminas.sizeId')
                    ->where('aluminas.alumina_id','=',$id)       
                    ->where('costItems.periodeId',$periode)                  
                    ->where('year','=',$year)                  
                    ->select('items.itemCode','itemPrice','items.volume','dvolume','sizes.size','periodes.periode_id','costItems.year')
                    ->get();
                   
                    $totalVolume=0;  
                    $totalPrice=0;
                    $average=0;
                    
                     foreach($aluminas as $item){  
                          $totalVolume+=$item->dvolume; 
                          $totalPrice+=round(($item->dvolume/100)*$item->itemPrice,2);    
                     }
                     $average=round(($totalPrice*100)/$totalVolume,2);
                     $qty=$getSize->quantity;
                     $weightDry=$data->weightPcs*$qty;
                     $costDry=round($weightDry*$average,2);
        return  $costDry;
    }
}
