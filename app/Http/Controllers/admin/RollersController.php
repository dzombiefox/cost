<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\Roller;
use Illuminate\Http\Request;
use Session;
use Input;
class RollersController extends Controller
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
        $rollers = Roller::paginate(25);

        return view('admin.rollers.index', compact('rollers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.rollers.create');
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
        $motif=$request->motif;
        $price=$request->price;
        $lifetime;
        if($motif==0)
        {
            $lifetime=100000;
        }
        else{
            $lifetime=50000;
        }
        $printing=$price/$lifetime;
        $requestData =array_merge($requestData, array("lifeTime"=>$lifetime,"printing"=>$printing));
       
        Roller::create($requestData);

        //Session::flash('flash_message', 'Roller added!');

       return redirect('admin/rollers');
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
        $roller = Roller::findOrFail($id);

        return view('admin.rollers.show', compact('roller'));
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
        $roller = Roller::findOrFail($id);

        return view('admin.rollers.edit', compact('roller'));
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
        
        $roller = Roller::findOrFail($id);
         $motif=$request->motif;
        $price=$request->price;
        $lifetime;
        if($motif==0)
        {
            $lifetime=100000;
        }
        else{
            $lifetime=50000;
        }
        $printing=$price/$lifetime;
        $requestData =array_merge($requestData, array("lifeTime"=>$lifetime,"printing"=>$printing));
        $roller->update($requestData);

        Session::flash('flash_message', 'Roller updated!');

        return redirect('admin/rollers');
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
        Roller::destroy($id);

        Session::flash('flash_message', 'Roller deleted!');

        return redirect('admin/rollers');
    }
}
