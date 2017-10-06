<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\Dglaze;
use Illuminate\Http\Request;
use Session;
use DB;
class DglazesController extends Controller
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
        $dglazes = Dglaze::paginate(25);

        return view('admin.dglazes.index', compact('dglazes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.dglazes.create');
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
        $itemId=$request->glazeId;
        $requestData = array_merge($requestData, array("category"=>0));    
        Dglaze::create($requestData);
        $dglazes=DB::table('dglazes')
                ->join('items','items.item_id','=','dglazes.itemId')
                ->where('category','=',0)
                ->where('dglazes.glazeId','=',$itemId)->get();
        return $dglazes;
      /*  
        $requestData = $request->all();
        
        Dglaze::create($requestData);

        Session::flash('flash_message', 'Dglaze added!');

        return redirect('admin/dglazes');
    
       */
        
        
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
        $dglaze = Dglaze::findOrFail($id);

        return view('admin.dglazes.show', compact('dglaze'));
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
        $dglaze = Dglaze::findOrFail($id);

        return view('admin.dglazes.edit', compact('dglaze'));
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
        
        $dglaze = Dglaze::findOrFail($id);
        $id=$dglaze->glazeId;
        $dglaze->update($requestData);
        $dglazes=DB::table('dglazes')
                ->join('items','items.item_id','=','dglazes.itemId')
                ->where('category','=',0)
                ->where('dglazes.glazeId','=',$id)->get();
        return $dglazes;

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
        $data=DB::table('dglazes')->where('dglazes.dglaze_id','=',$id)->first();
        $idglaze=$data->glazeId;
        Dglaze::destroy($id);
        $dataglaze=DB::table('dglazes')
                ->join('items','items.item_id','=','dglazes.itemId')
                ->where('dglazes.glazeId','=',$idglaze)       
                ->where('dglazes.category','=',0)
                ->get();        
        return $dataglaze;
    }
}
