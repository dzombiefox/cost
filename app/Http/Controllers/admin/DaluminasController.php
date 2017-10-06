<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\Dalumina;
use Illuminate\Http\Request;
use Session;
use DB;

class DaluminasController extends Controller
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
        $daluminas = Dalumina::paginate(25);

        return view('admin.daluminas.index', compact('daluminas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.daluminas.create');
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
        $id=$request->aluminaId;
        $requestData = $request->all();        
        Dalumina::create($requestData);
        $daluminas=DB::table('daluminas')
                ->join('items','items.item_id','=','daluminas.itemId')
                ->where('daluminas.aluminaId','=',$id)->get();
        return $daluminas;
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
        $dalumina = Dalumina::findOrFail($id);

        return view('admin.daluminas.show', compact('dalumina'));
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
        $dalumina = Dalumina::findOrFail($id);

        return view('admin.daluminas.edit', compact('dalumina'));
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
        $dalumina = Dalumina::findOrFail($id);
        $id=$dalumina->aluminaId;
        $dalumina->update($requestData);
        $daluminas=DB::table('daluminas')
                ->join('items','items.item_id','=','daluminas.itemId')
                ->where('daluminas.aluminaId','=',$id)->get();
        return $daluminas;
    
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
        $data=DB::table('daluminas')->where('daluminas.dalumina_id','=',$id)->first();
        $idAlumina=$data->aluminaId;
        Dalumina::destroy($id);
        $data=DB::table('daluminas')
                ->join('items','items.item_id','=','daluminas.itemId')
                ->where('daluminas.aluminaId','=',$idAlumina)       
                ->get();
        
        return $data;
    }
}
