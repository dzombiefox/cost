<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\Motif;
use Illuminate\Http\Request;
use Session;
use DB;
class MotifsController extends Controller
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
        //$motifs = Motif::paginate(25);
         $motifs=DB::table('motifs')
        ->join('types','types.type_id','=','motifs.typeId')
        ->join('brands','brands.brand_id','=','motifs.brandId')
        ->join('options','options.option_id','=','motifs.optionId')
        ->get();

        return view('admin.motifs.index', compact('motifs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $brand=DB::table('brands')->get();
        $type=DB::table('types')->get();
        $option=DB::table('options')->get();        
        return view('admin.motifs.create', compact('brand','type','option'));
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
        
        Motif::create($requestData);

        Session::flash('flash_message', 'Motif added!');

        return redirect('admin/motifs');
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
        $motif = DB::table('motifs')
                ->join('types','types.type_id','=','motifs.typeId')
                ->where('motifs.motif_id','=',$id)
                ->first();

        return view('admin.motifs.show', compact('motif'));
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
        $motif=DB::table('motifs')
        ->join('types','types.type_id','=','motifs.typeId')
        ->join('brands','brands.brand_id','=','motifs.brandId')
        ->join('options','options.option_id','=','motifs.optionId')
        ->where('motifs.motif_id','=',$id)->first();
        $brand=DB::table('brands')->get();
        $type=DB::table('types')->get();
        $option=DB::table('options')->get(); 
        return view('admin.motifs.edit', compact('motif','brand','type','option'));
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
        
        $motif = Motif::findOrFail($id);
        $motif->update($requestData);

        Session::flash('flash_message', 'Motif updated!');

        return redirect('admin/motifs');
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
        Motif::destroy($id);

        Session::flash('flash_message', 'Motif deleted!');

        return redirect('admin/motifs');
    }
}
