<?php
namespace App\Http\Controllers\admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\Formula;
use Illuminate\Http\Request;
use Session;
use DB;
class FormulasController extends Controller
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
        
        $formulas = DB::table('formulas')
               ->join('sizes','sizes.size_id','=','formulas.sizeId')
               ->join('datas','datas.data_id','=','formulas.dataId')
                ->get();
        
        return view('admin.formulas.index', compact('formulas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $status=DB::table('status')->get();
        $datas=DB::table('datas')->get();
        $sizes=DB::table('sizes')->get();
        return view('admin.formulas.create', compact('status','datas','sizes'));
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
        
        Formula::create($requestData);

        Session::flash('flash_message', 'Formula added!');

        return redirect('admin/formulas');
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
        $formula=DB::table('formulas')
                ->join('status','status.status_id','=','formulas.statusId')
                ->join('datas','datas.data_id','=','formulas.dataId')
                ->join('sizes','sizes.size_id','=','formulas.sizeId')
                ->where('formulas.formula_id','=',$id)->first();

        return view('admin.formulas.show', compact('formula'));
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
        $status=DB::table('status')->get();
        $datas=DB::table('datas')->get();
        $sizes=DB::table('sizes')->get();
        //$formula = Formula::findOrFail($id);
        $formula=DB::table('formulas')
                ->join('status','status.status_id','=','formulas.statusId')
                ->join('datas','datas.data_id','=','formulas.dataId')
                ->join('sizes','sizes.size_id','=','formulas.sizeId')
                ->where('formulas.formula_id','=',$id)->first();
        return view('admin.formulas.edit', compact('formula','status','datas','sizes'));
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
        
        $formula = Formula::findOrFail($id);
        $formula->update($requestData);

        Session::flash('flash_message', 'Formula updated!');

        return redirect('admin/formulas');
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
        Formula::destroy($id);

        Session::flash('flash_message', 'Formula deleted!');

        return redirect('admin/formulas');
    }
}
