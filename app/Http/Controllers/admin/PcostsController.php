<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\Pcost;
use App\model\Periode;
use Illuminate\Http\Request;
use Session;
use DB;
class PcostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pcosts = DB::table('pcosts')
            ->join('line','line.line_id','=','pcosts.lineId')
            ->join('sizes','sizes.size_id','=','pcosts.sizeId')
            ->join('periodes','periodes.periode_id','=','pcosts.periodeId')
            ->get();

        return view('admin.pcosts.index', compact('pcosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $year=DB::table('costItems')->distinct('year')->get(array('year'));
        $periodes=Periode::distinct('periodes.periodeName')
                ->join('costItems','costItems.periodeId','=','periodes.periode_id') 
                ->select('periode_id','periodeName')
                ->get();
        $sizes=DB::table('sizes')->get();
        $lines=DB::table('line')->get();
        return view('admin.pcosts.create',compact('sizes','lines','periodes','year'));
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
        
        Pcost::create($requestData);

        Session::flash('flash_message', 'Pcost added!');

        return redirect('admin/pcosts');
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
        $pcost = Pcost::findOrFail($id);

        return view('admin.pcosts.show', compact('pcost'));
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
        $pcost = Pcost::findOrFail($id);
        $year=DB::table('costItems')->distinct('year')->get(array('year'));
        $periodes=Periode::distinct('periodes.periodeName')
                ->join('costItems','costItems.periodeId','=','periodes.periode_id') 
                ->select('periode_id','periodeName')
                ->get();
        $sizes=DB::table('sizes')->get();
        $lines=DB::table('line')->get();

        return view('admin.pcosts.edit', compact('pcost','sizes','lines','periodes','year'));
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
        
        $pcost = Pcost::findOrFail($id);
        $pcost->update($requestData);

        Session::flash('flash_message', 'Pcost updated!');

        return redirect('admin/pcosts');
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
        Pcost::destroy($id);

        Session::flash('flash_message', 'Pcost deleted!');

        return redirect('admin/pcosts');
    }
}
