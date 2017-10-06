<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\Froller;
use Illuminate\Http\Request;
use Session;
use DB;
class FrollersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $frollers = Froller::paginate(25);

        return view('admin.frollers.index', compact('frollers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.frollers.create');
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
        $finishId=$request->finishId;
        Froller::create($requestData);
        $frollers=DB::table('frollers')
                ->join('rollers','rollers.roller_id','=','frollers.rollerId')
                ->where('frollers.finishId','=',$finishId)->get();
        return $frollers;
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
        $froller = Froller::findOrFail($id);

        return view('admin.frollers.show', compact('froller'));
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
        $froller = Froller::findOrFail($id);

        return view('admin.frollers.edit', compact('froller'));
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
        
        $froller = Froller::findOrFail($id);
        $froller->update($requestData);

        Session::flash('flash_message', 'Froller updated!');

        return redirect('admin/frollers');
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
        $data=DB::table('frollers')->where('frollers.froller_id','=',$id)->first();
        $finishId=$data->finishId;
        Froller::destroy($id);        
        $frollers=DB::table('frollers')
                ->join('rollers','rollers.roller_id','=','frollers.rollerId')
                ->where('frollers.finishId','=',$finishId)->get();
        return $frollers;
    }
}
