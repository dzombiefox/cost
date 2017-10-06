<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\Fpasta;
use Illuminate\Http\Request;
use Session;
use DB;
class FpastasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $fpastas = Fpasta::paginate(25);

        return view('admin.fpastas.index', compact('fpastas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.fpastas.create');
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
        Fpasta::create($requestData);
        $fpastas=DB::table('fpastas')
                ->join('pastas','pastas.pasta_id','=','fpastas.pastaId')
                ->join('sizes','sizes.size_id','=','pastas.sizeId')
                ->join('colors','colors.color_id','=','pastas.colorId')
                ->where('fpastas.finishId','=',$finishId)->get();
        return $fpastas;
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
        $fpasta = Fpasta::findOrFail($id);

        return view('admin.fpastas.show', compact('fpasta'));
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
        $fpasta = Fpasta::findOrFail($id);

        return view('admin.fpastas.edit', compact('fpasta'));
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
        
        $fpasta = Fpasta::findOrFail($id);
        $fpasta->update($requestData);

        Session::flash('flash_message', 'Fpasta updated!');

        return redirect('admin/fpastas');
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
        $data=DB::table('fpastas')->where('fpastas.fpasta_id','=',$id)->first();
        $finishId=$data->finishId;
        Fpasta::destroy($id);
        
        $fpastas=DB::table('fpastas')
                ->join('pastas','pastas.pasta_id','=','fpastas.pastaId')
                ->join('sizes','sizes.size_id','=','pastas.sizeId')
                ->join('colors','colors.color_id','=','pastas.colorId')
                ->where('fpastas.finishId','=',$finishId)->get();
        return $fpastas;     
        
    }
}
