<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\Price;
use Illuminate\Http\Request;
use Session;
use DB;
class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $motifs=DB::table('motifs')->get();
        $sizes=DB::table('sizes')->get();
        $colors=DB::table('colors')->get();
        $prices = DB::table('prices')
        ->join('motifs','motifs.motif_id','=','prices.motifId')
        ->join('sizes','sizes.size_id','=','prices.sizeId')
        ->join('colors','colors.color_id','=','prices.colorId')
        ->join('periodes','periodes.periode_id','=','prices.periodeId')
        ->get();


        return view('admin.prices.index', compact('prices','motifs','sizes','colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $motifs=DB::table('motifs')->get();
        $sizes=DB::table('sizes')->get();
        $colors=DB::table('colors')->get();
        $periodes=DB::table('periodes')->get();
        $year=DB::table('costItems')->distinct('year')->get(array('year'));
        return view('admin.prices.create',compact('motifs','sizes','colors','periodes','year'));
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
        
        Price::create($requestData);

        Session::flash('flash_message', 'Price added!');

        return redirect('admin/prices');
    }

    public function copy(Request $request){
       $requestData = $request->all();
       $id=$request->price_id;
       $price = Price::findOrFail($id);
       $data = array(
        'motifId' => $request->motifId,
        'sizeId'=>$request->sizeId,
        'colorId'=>$request->colorId,
        'skw_1'=>$price->skw_1,
        'skw_2'=>$price->skw_2,
        'skw_3'=>$price->skw_3,
        'skw_4'=>$price->skw_4,
        'skw_5'=>$price->skw_5,
        'periodeId'=>$price->periodeId,
        'year'=>$price->year,

         );
        Price::create($data);
        return back();
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
        $price = Price::findOrFail($id);

        return view('admin.prices.show', compact('price'));
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
        $price = Price::findOrFail($id);
        $motifs=DB::table('motifs')->get();
        $sizes=DB::table('sizes')->get();
        $colors=DB::table('colors')->get();
        $periodes=DB::table('periodes')->get();
        $year=DB::table('costItems')->distinct('year')->get(array('year'));
        return view('admin.prices.edit', compact('price','motifs','sizes','colors','periodes','year'));
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
        
        $price = Price::findOrFail($id);
        $price->update($requestData);

        Session::flash('flash_message', 'Price updated!');

        return redirect('admin/prices');
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
        Price::destroy($id);

        Session::flash('flash_message', 'Price deleted!');

        return redirect('admin/prices');
    }
}
