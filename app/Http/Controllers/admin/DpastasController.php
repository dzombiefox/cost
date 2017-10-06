<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\Dpasta;
use Illuminate\Http\Request;
use Session;
use DB;
class DpastasController extends Controller
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
        $dpastas = Dpasta::paginate(25);

        return view('admin.dpastas.index', compact('dpastas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.dpastas.create');
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
        $itemId=$request->pastaId;
        Dpasta::create($requestData);
        $dpastas=DB::table('dpastas')
                ->join('items','items.item_id','=','dpastas.itemId')
                ->where('dpastas.pastaId','=',$itemId)->get();
        return $dpastas;
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
        $dpasta = Dpasta::findOrFail($id);

        return view('admin.dpastas.show', compact('dpasta'));
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
        $dpasta = Dpasta::findOrFail($id);

        return view('admin.dpastas.edit', compact('dpasta'));
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
        
        $dpasta = Dpasta::findOrFail($id);
        $dpasta->update($requestData);
        $itemId=$dpasta->pastaId;
        $dpastas=DB::table('dpastas')
                ->join('items','items.item_id','=','dpastas.itemId')
                ->where('dpastas.pastaId','=',$itemId)->get();
        return $dpastas;
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
        $data=DB::table('dpastas')->where('dpastas.dpasta_id','=',$id)->first();
        $idpasta=$data->pastaId;
        Dpasta::destroy($id);
        $datapasta=DB::table('dpastas')
                ->join('items','items.item_id','=','dpastas.itemId')
                ->where('dpastas.pastaId','=',$idpasta)       
                ->get();        
        return $datapasta;
    }
}
