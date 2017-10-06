<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\Ddrop;
use Illuminate\Http\Request;
use Session;
use DB;
class DdropsController extends Controller
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
        $ddrops = Ddrop::paginate(25);

        return view('admin.ddrops.index', compact('ddrops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.ddrops.create');
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
        $itemId=$request->dropId;
        $requestData = array_merge($requestData, array("category"=>0));    
        Ddrop::create($requestData);
        $ddrops=DB::table('ddrops')
                ->join('items','items.item_id','=','ddrops.itemId')
                ->where('category','=',0)
                ->where('ddrops.dropId','=',$itemId)->get();
        return $ddrops;
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
        $ddrop = Ddrop::findOrFail($id);

        return view('admin.ddrops.show', compact('ddrop'));
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
        $ddrop = Ddrop::findOrFail($id);

        return view('admin.ddrops.edit', compact('ddrop'));
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
        
        $ddrop = Ddrop::findOrFail($id);
        $itemId=$ddrop->dropId;
        $ddrop->update($requestData);       
        $ddrops=DB::table('ddrops')
                ->join('items','items.item_id','=','ddrops.itemId')
                ->where('category','=',0)
                ->where('ddrops.dropId','=',$itemId)->get();
        return $ddrops;
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
        $data=DB::table('ddrops')->where('ddrops.ddrop_id','=',$id)->first();
        $iddrop=$data->dropId;
        Ddrop::destroy($id);
        $datadrop=DB::table('ddrops')
                ->join('items','items.item_id','=','ddrops.itemId')
                ->where('ddrops.dropId','=',$iddrop)       
                ->where('ddrops.category','=',0)
                ->get();        
        return $datadrop;
    }
}
