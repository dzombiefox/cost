<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\Finish;
use App\model\Periode;
use Illuminate\Http\Request;
use Session;
use DB;
class FinishsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $finishs = DB::table('finishs')
                ->join('motifs','motifs.motif_id','=','finishs.motifId')
                ->join('brands','brands.brand_id','=','motifs.brandId')
                ->join('colors','colors.color_id','=','finishs.colorId')
                ->join('sizes','sizes.size_id','=','finishs.sizeId')
                ->join('line','line.line_id','=','finishs.lineId')
                ->get();
        $fpastas=DB::table('fpastas')->get();
        $finks=DB::table('finks')->get();
        $frollers=DB::table('frollers')
                ->join('rollers','rollers.roller_id','=','frollers.rollerId')
                ->get();
        return view('admin.finishs.index', compact('finishs','fpastas','frollers','finks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $periodes=Periode::distinct('periodes.periodeName')
                ->join('costItems','costItems.periodeId','=','periodes.periode_id') 
                ->select('periode_id','periodeName')
                ->get();
       /* $periodes=DB::table('periodes')
                ->join('costItems','costItems.periodeId','=','periodes.periode_id') 
                
                ->get();*/
        $bodys=DB::table('bodys')
                ->join('sizes','sizes.size_id','=','bodys.sizeId')                
                ->get();
        $lines=DB::table('line')->get();       
        $aluminas=DB::table('aluminas')->get();
        $engobes=DB::table('engobes')->get();
        $glazes=DB::table('glazes')->get();
        $drops=DB::table('drops')->get();
        $inks=DB::table('inks')->get();
        $rollers=DB::table('rollers')->get();
        $pastas=DB::table('pastas')->get();
        $motifs=DB::table('motifs')
                ->join('types','types.type_id','=','motifs.typeId')
                ->join('brands','brands.brand_id','=','motifs.brandId')
                ->join('options','options.option_id','=','motifs.optionId')
                ->get();
        $size=DB::table('sizes')->get();
        $color=DB::table('colors')->get();
        $year=DB::table('costItems')->distinct('year')->get(array('year'));
    
        return view('admin.finishs.create', compact('motifs','size','color','bodys','aluminas','engobes','glazes','drops','periodes','inks','pastas','rollers','year','lines'));
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
        
        Finish::create($requestData);
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
        //$finish = Finish::findOrFail($id);
          $finish=DB::table('finishs')
                    ->join('motifs','motifs.motif_id','=','finishs.motifId')
                    ->join('sizes','sizes.size_id','=','finishs.sizeId')
                    ->join('colors','colors.color_id','=','finishs.colorId')
                    ->join('bodys','bodys.body_id','=','finishs.bodyId')
                    ->join('aluminas','aluminas.alumina_id','=','finishs.aluminaId')
                    ->join('engobes','engobes.engobe_id','=','finishs.engobeId')
                    ->join('glazes','glazes.glaze_id','=','finishs.glazeId')
                    ->leftjoin('drops','drops.drop_id','=','finishs.dropId')
                    ->join('periodes','periodes.periode_id','=','finishs.periodeId')
                    ->where('finish_id','=',$id)
                    ->first();
          $pastas =DB::table('finishs')
                    ->join('fpastas','fpastas.finishId','=','finishs.finish_id')
                    ->join('pastas','pastas.pasta_id','=','fpastas.pastaId')
                    ->join('sizes','sizes.size_id','=','pastas.sizeId')
                    ->join('colors','colors.color_id','=','pastas.colorId')
                    ->where('fpastas.finishId','=',$finish->finish_id)
                    ->get();
           $rollers=DB::table('finishs')
                    ->join('frollers','frollers.finishId','=','finishs.finish_id')
                    ->join('rollers','rollers.roller_id','=','frollers.rollerId')
                    ->where('frollers.finishId','=',$finish->finish_id)
                    ->get();     

            $inks = DB::table('finishs')
                    ->join('finks','finks.finishId','=','finishs.finish_id')
                    ->join('inks','inks.ink_id','=','finks.inkId')
                    ->join('sizes','sizes.size_id','=','inks.sizeId')
                    ->join('colors','colors.color_id','=','inks.colorId')
                    ->where('finks.finishId','=',$finish->finish_id)
                    ->get();    


               //  return $adetails;                        
     //return $details;
       return view('admin.finishs.show', compact('finish','pastas','rollers','inks'));
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
         $periodes=Periode::distinct('periodes.periodeName')
                ->join('costItems','costItems.periodeId','=','periodes.periode_id') 
                ->select('periode_id','periodeName')
                ->get();
       /* $periodes=DB::table('periodes')
                ->join('costItems','costItems.periodeId','=','periodes.periode_id') 
                
                ->get();*/
        $bodys=DB::table('bodys')
                ->join('sizes','sizes.size_id','=','bodys.sizeId')
                
                ->get();
        $aluminas=DB::table('aluminas')->get();
        $engobes=DB::table('engobes')->get();
        $glazes=DB::table('glazes')->get();
        $drops=DB::table('drops')->get();
        $inks=DB::table('inks')->get();
        $rollers=DB::table('rollers')->get();
        $pastas=DB::table('pastas')->get();
        $lines=DB::table('line')->get();  
        $motifs=DB::table('motifs')
                ->join('types','types.type_id','=','motifs.typeId')
                ->join('brands','brands.brand_id','=','motifs.brandId')
                ->join('options','options.option_id','=','motifs.optionId')
                ->get();
        $size=DB::table('sizes')->get();
        $color=DB::table('colors')->get();
        $year=DB::table('costItems')->distinct('year')->get(array('year'));
        $finish = Finish::findOrFail($id);
        $pasta =DB::table('finishs')
                    ->join('fpastas','fpastas.finishId','=','finishs.finish_id')
                    ->join('pastas','pastas.pasta_id','=','fpastas.pastaId')
                    ->join('sizes','sizes.size_id','=','pastas.sizeId')
                    ->join('colors','colors.color_id','=','pastas.colorId')
                    ->where('fpastas.finishId','=',$finish->finish_id)
                    ->get();
        $roller=DB::table('finishs')
                    ->join('frollers','frollers.finishId','=','finishs.finish_id')
                    ->join('rollers','rollers.roller_id','=','frollers.rollerId')
                    ->where('frollers.finishId','=',$finish->finish_id)
                    ->get();      
        $ink = DB::table('finishs')
                    ->join('finks','finks.finishId','=','finishs.finish_id')
                    ->join('inks','inks.ink_id','=','finks.inkId')
                    ->join('sizes','sizes.size_id','=','inks.sizeId')
                    ->join('colors','colors.color_id','=','inks.colorId')
                    ->where('finks.finishId','=',$finish->finish_id)
                    ->get();   
                                       
        return view('admin.finishs.edit',compact('finish','motifs','size','color','bodys','aluminas','engobes','glazes','drops','periodes','inks','pastas','rollers','year','pasta','roller','ink','lines'));
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
        
        $finish = Finish::findOrFail($id);
        $finish->update($requestData);

        Session::flash('flash_message', 'Finish updated!');

        return redirect('admin/finishs');
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
        Finish::destroy($id);

        Session::flash('flash_message', 'Finish deleted!');

        return redirect('admin/finishs');
    }


    public function reportAll(){
      $finishs = DB::table('finishs')
                ->join('motifs','motifs.motif_id','=','finishs.motifId')
                ->join('brands','brands.brand_id','=','motifs.brandId')
                ->join('colors','colors.color_id','=','finishs.colorId')
                ->join('sizes','sizes.size_id','=','finishs.sizeId')
                ->join('line','line.line_id','=','finishs.lineId')
                ->join('prices',function($join) {
                    $join->on('prices.motifId','=','finishs.motifId');
                    $join->on('prices.sizeId','=','finishs.sizeId');
                    $join->on('prices.colorId','=','finishs.colorId');
                    $join->on('prices.periodeId','=','finishs.periodeId');
                    $join->on('prices.year','=','finishs.year');

                })
                ->join('pcosts',function($join){
                    $join->on('pcosts.sizeId','=','finishs.sizeId');
                    $join->on('pcosts.lineId','=','finishs.lineId');
                    $join->on('pcosts.periodeId','=','finishs.periodeId');
                    $join->on('pcosts.year','=','finishs.year');
                })

               
                ->get();
        $fpastas=DB::table('fpastas')->get();
        $finks=DB::table('finks')->get();
        $frollers=DB::table('frollers')
                ->join('rollers','rollers.roller_id','=','frollers.rollerId')
                ->get();
 //return $finishs;
       return view('/admin/finishs/reportAll', compact('finishs','fpastas','frollers','finks'));
//return view('/admin/finishs/reportAll');

    }
}
