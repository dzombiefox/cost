<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\Type;
use Illuminate\Http\Request;
use Session;
use DB;

class TypesController extends Controller
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
       // $types = Type::paginate(25);
$types=DB::table('types')
        ->join('densitys','densitys.density_id','=','types.densityId')
        ->get();
//return $types;
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $density=DB::table('densitys')->get();
        return view('admin.types.create', compact('density'));
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
        
        Type::create($requestData);

        Session::flash('flash_message', 'Type added!');

        return redirect('admin/types');
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
        $type = DB::table('types')
                ->join('densitys','densitys.density_id','=','types.densityId')
                ->where('types.type_id','=',$id)
                ->first();

        return view('admin.types.show', compact('type'));
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
        $density=DB::table('densitys')->get();
        $type=DB::table('types')
                ->join('densitys','densitys.density_id','=','types.densityId')
                ->where('types.type_id','=',$id)->first();

        return view('admin.types.edit', compact('type','density'));
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
        
        $type = Type::findOrFail($id);
        $type->update($requestData);

        Session::flash('flash_message', 'Type updated!');

        return redirect('admin/types');
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
        Type::destroy($id);

        Session::flash('flash_message', 'Type deleted!');

        return redirect('admin/types');
    }
}
