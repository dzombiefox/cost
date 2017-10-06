<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\Dengobe;
use Illuminate\Http\Request;
use Session;
use DB;
class DengobesController extends Controller
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
        $dengobes = Dengobe::paginate(25);

        return view('admin.dengobes.index', compact('dengobes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.dengobes.create');
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
        $id=$request->engobeId;
        $requestData = array_merge($requestData, array("category"=>0));    
        Dengobe::create($requestData);
        $dengobes=DB::table('dengobes')
                ->join('items','items.item_id','=','dengobes.itemId')
                ->where('category','=',0)
                ->where('dengobes.engobeId','=',$id)->get();
        return $dengobes;

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
        $dengobe = Dengobe::findOrFail($id);

        return view('admin.dengobes.show', compact('dengobe'));
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
        $dengobe = Dengobe::findOrFail($id);

        return view('admin.dengobes.edit', compact('dengobe'));
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
        $dengobe = Dengobe::findOrFail($id);
        $id=$dengobe->engobeId;
        $dengobe->update($requestData);        
        $dengobes=DB::table('dengobes')
                ->join('items','items.item_id','=','dengobes.itemId')
                ->where('category','=',0)
                ->where('dengobes.engobeId','=',$id)->get();
        return $dengobes;

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
        $data=DB::table('dengobes')->where('dengobes.dengobe_id','=',$id)->first();
        $idengobe=$data->engobeId;
        Dengobe::destroy($id);
        $dataengobe=DB::table('dengobes')
                ->join('items','items.item_id','=','dengobes.itemId')
                ->where('dengobes.engobeId','=',$idengobe)       
                ->where('dengobes.category','=',0)
                ->get();
        
        return $dataengobe;
        
        
    }
}
