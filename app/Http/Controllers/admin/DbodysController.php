<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\Item;
use App\model\Dbody;
use Illuminate\Http\Request;
use Session;
use DB;
class DbodysController extends Controller
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
        $dbodys = Dbody::paginate(25);

        return view('admin.dbodys.index', compact('dbodys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.dbodys.create');
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
        $id=$request->bodyId;
        $itemId=$request->itemId;
        $item=Item::findOrFail($itemId);
        $volume=$item->volume;
        $requestData = array_merge($requestData, array("category"=>0,'h2O'=>$volume));    
        Dbody::create($requestData);
        $dbodys=DB::table('dbodys')
                ->join('items','items.item_id','=','dbodys.itemId')
                ->where('category','=',0)
                ->where('dbodys.bodyId','=',$id)->get();
        return $dbodys;


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
        $dbody = Dbody::findOrFail($id);

        return view('admin.dbodys.show', compact('dbody'));
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
        $dbody = Dbody::findOrFail($id);

        return view('admin.dbodys.edit', compact('dbody'));
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
        $dbody = Dbody::findOrFail($id);
        $itemId=$dbody->bodyId;
        $dbody->update($requestData);
               $dbodys=DB::table('dbodys')
                ->join('items','items.item_id','=','dbodys.itemId')
                ->where('category','=',0)
                ->where('dbodys.bodyId','=',$itemId)->get();
        return $dbodys;
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
        $data=DB::table('dbodys')->where('dbodys.dbody_id','=',$id)->first();
        $idbody=$data->bodyId;
        Dbody::destroy($id);
        $databody=DB::table('dbodys')
                ->join('items','items.item_id','=','dbodys.itemId')
                ->where('dbodys.bodyId','=',$idbody)       
                ->where('dbodys.category','=',0)
                ->get();
        
        return $databody;
       
    }
}
