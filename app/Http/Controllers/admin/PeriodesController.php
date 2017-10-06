<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\Periode;
use Illuminate\Http\Request;
use Session;
use DB;
class PeriodesController extends Controller
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
        
        DB::select('call proc_costdryBody(?,?,?,?)',array(137,@weight,1,2016));
      echo @weight;
      // return DB::statement('call proc_costdryBody(?,?,?,?)',array(137,@weight,1,2016));
       // $result=  DB::select('select @weight as id');
       //  return $result[0]->id;
        //return view('admin.periodes.index', compact('periodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.periodes.create');
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
        
        Periode::create($requestData);

        Session::flash('flash_message', 'Periode added!');

        return redirect('admin/periodes');
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
        $periode = Periode::findOrFail($id);

        return view('admin.periodes.show', compact('periode'));
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
        $periode = Periode::findOrFail($id);

        return view('admin.periodes.edit', compact('periode'));
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
        
        $periode = Periode::findOrFail($id);
        $periode->update($requestData);

        Session::flash('flash_message', 'Periode updated!');

        return redirect('admin/periodes');
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
        Periode::destroy($id);

        Session::flash('flash_message', 'Periode deleted!');

        return redirect('admin/periodes');
    }
}
