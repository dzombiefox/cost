<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\CostItem;
use Illuminate\Http\Request;
use Session;
use DB;
class CostItemsController extends Controller
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
        $costitems =DB::table('costItems')
                ->join('items','items.item_id','=','costItems.itemId')
                ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                ->get();
        

        return view('admin.cost-items.index', compact('costitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $item=DB::table('items')->get();
        $periode=DB::table('periodes')->get();
        return view('admin.cost-items.create', compact('item','periode'));
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
        
        CostItem::create($requestData);

        Session::flash('flash_message', 'CostItem added!');

        return redirect('admin/cost-items');
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
         $costitem = DB::table('costItems')
                ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                ->join('items','items.item_id','=','costItems.itemId')
                ->where('costItem_id','=',$id)
                ->first();

        return view('admin.cost-items.show', compact('costitem'));
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
        $item=DB::table('items')->get();
        $periode=DB::table('periodes')->get();
        $costitem = DB::table('costItems')
                ->join('periodes','periodes.periode_id','=','costItems.periodeId')
                ->join('items','items.item_id','=','costItems.itemId')
                ->where('costItem_id','=',$id)
                ->first()
                ;
        //return $costitem;

        return view('admin.cost-items.edit', compact('costitem','item','periode'));
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
        
        $costitem = CostItem::findOrFail($id);
        $costitem->update($requestData);

        Session::flash('flash_message', 'CostItem updated!');

        return redirect('admin/cost-items');
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
        CostItem::destroy($id);

        Session::flash('flash_message', 'CostItem deleted!');

        return redirect('admin/cost-items');
    }
}
