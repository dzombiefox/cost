<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\Fink;
use Illuminate\Http\Request;
use Session;
use DB;

class FinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $finks = Fink::paginate(25);

        return view('admin.finks.index', compact('finks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.finks.create');
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
        Fink::create($requestData);
        $finks=DB::table('finks')
                ->join('inks','inks.ink_id','=','finks.inkId')
                ->join('sizes','sizes.size_id','=','inks.sizeId')
                ->join('colors','colors.color_id','=','inks.colorId')
                ->where('finks.finishId','=',$finishId)->get();
        return $finks;

         
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
        $fink = Fink::findOrFail($id);

        return view('admin.finks.show', compact('fink'));
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
        $fink = Fink::findOrFail($id);

        return view('admin.finks.edit', compact('fink'));
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
        
        $fink = Fink::findOrFail($id);
        $fink->update($requestData);

        Session::flash('flash_message', 'Fink updated!');

        return redirect('admin/finks');
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
        $data=DB::table('finks')->where('finks.fink_id','=',$id)->first();
        $finishId=$data->finishId;
        Fink::destroy($id);        
        $finks=DB::table('finks')
                ->join('inks','inks.ink_id','=','finks.inkId')
                ->join('sizes','sizes.size_id','=','inks.sizeId')
                ->join('colors','colors.color_id','=','inks.colorId')
                ->where('finks.finishId','=',$finishId)->get();
        return $finks;
    }
}
