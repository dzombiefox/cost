<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\Dink;
use Illuminate\Http\Request;
use Session;
use DB;
class DinksController extends Controller
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
        $dinks = Dink::paginate(25);

        return view('admin.dinks.index', compact('dinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.dinks.create');
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
        $itemId=$request->inkId;
        Dink::create($requestData);
        $dinks=DB::table('dinks')
                ->join('items','items.item_id','=','dinks.itemId')
                ->where('dinks.inkId','=',$itemId)->get();
        return $dinks;
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
        $dink = Dink::findOrFail($id);

        return view('admin.dinks.show', compact('dink'));
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
        $dink = Dink::findOrFail($id);

        return view('admin.dinks.edit', compact('dink'));
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
        
        $dink = Dink::findOrFail($id);
        $dink->update($requestData);
        $itemId=$dink->inkId;
        $dinks=DB::table('dinks')
                ->join('items','items.item_id','=','dinks.itemId')
                ->where('dinks.inkId','=',$itemId)->get();
        return $dinks;
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
        $data=DB::table('dinks')->where('dinks.dink_id','=',$id)->first();
        $idink=$data->inkId;
        Dink::destroy($id);
        $dataink=DB::table('dinks')
                ->join('items','items.item_id','=','dinks.itemId')
                ->where('dinks.inkId','=',$idink)       
                ->get();        
        return $dataink;
    }
}
