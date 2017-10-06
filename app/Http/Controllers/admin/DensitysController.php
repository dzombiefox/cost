<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Density;
use Illuminate\Http\Request;
use Session;

class DensitysController extends Controller
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
        $densitys = Density::paginate(25);

        return view('admin.densitys.index', compact('densitys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.densitys.create');
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
        
        Density::create($requestData);

        Session::flash('flash_message', 'Density added!');

        return redirect('admin/densitys');
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
        $density = Density::findOrFail($id);

        return view('admin.densitys.show', compact('density'));
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
        $density = Density::findOrFail($id);

        return view('admin.densitys.edit', compact('density'));
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
        
        $density = Density::findOrFail($id);
        $density->update($requestData);

        Session::flash('flash_message', 'Density updated!');

        return redirect('admin/densitys');
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
        Density::destroy($id);

        Session::flash('flash_message', 'Density deleted!');

        return redirect('admin/densitys');
    }
}
