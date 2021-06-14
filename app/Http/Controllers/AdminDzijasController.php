<?php

namespace App\Http\Controllers;

use App\Models\Dzija;
use App\Models\Razotajs;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use function redirect;
use function view;

class AdminDzijasController extends Controller
{
       public function __construct() {

       //$this->middleware('auth.admin')->only(['edit', 'create', 'store', 'destroy']);
       //$this->middleware('auth.admin')->only(['edit']);
       //$this->middleware('auth.admin')->only(['edit', 'create', 'store', 'destroy']);
        //$this->middleware('auth', ['only'=>'edit']);
    //only Admins have access to the following methods
        // $this->middleware('auth.admin')->only(['create', 'store']);
         // only authenticated users have access to the methods of the controller
        //$this->middleware('auth');
     }
    public function index()
    {
        if (Gate::allows('is-admin')) {
        $dzijas = Dzija::all();
        return view('admindzijas',  compact('dzijas'));
    }
        else {
        return redirect('/')->withErrors('Access denied');
        }
    }

    // public function index($id)
    // {
    // $dzijas = Dzija::where('razotajs_id','=',$id)->get();
    // return view('dzijas',['razotajs_id'=>$id,'izstradajumi'=>$dzijas]);
    // }
    /**
     * Forma jaunai dzijai.
     *
     * @return Response
     */
    public function edit($id)
    {
        if (Gate::allows('is-admin')) {
            $dzija = Dzija::find($id);
            return view ('dzija_edit', compact('dzija'));
        }
        else {
            return redirect('dashboard')->withErrors('Access denied');
        }
    }
    public function update(Request $request, $id)
    {
    $rules = array(
        'nosaukums' => 'required|string|min:2|max:50',
        'apraksts' => 'nullable|string',
        'garums' => 'required|min:1|integer|max:9999',
    );
    $this->validate($request, $rules);

    $dzija = Dzija::find($id);
//    $product->fill($request->all($id));
    $dzija->nosaukums = $request['nosaukums'];
    $dzija->garums = $request['garums'];
    $dzija->apraksts = $request['apraksts'];
    $dzija->save();
    return redirect('admindzijas');
    }

    public function create()
    {   
        if (Gate::allows('is-admin')) {
            $razotaji = Razotajs::all()->map(function ($razotajs) {
                $razotajs->value = $razotajs->id;
                return $razotajs;
           });
        return view('jaunadzija', compact ('razotaji'));
    }
    else {
            return redirect('dashboard')->withErrors('Access denied');
        }
    }
    
    /**
     * Saglabāt jaunizveidoto dziju DB.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if (Gate::allows('is-admin')) {
        $rules = array(
            'nosaukums' => 'required|string|min:2|max:50|unique:dzija',
            'apraksts' => 'nullable|string',
            'garums' => 'required|digits:4|integer|max:9999',
            'razotajs' => 'required|exists:razotajs_id',
        );        
        $this->validate($request, $rules); 
        
        $dzija = new Dzija();
        $dzija->nosaukums = $request->nosaukums;
        $dzija->apraksts = $request->apraksts;
        $dzija->garums = $request->garums;
        $dzija->veids()->associate(Razotajs::findOrFail($request->razotajs));
        $dzija->save();        
        return redirect()->route('admindzijas.index');
    }
    else {
            return redirect('dashboard')->withErrors('Access denied');
        }
    }

    /**
     * izdzēst.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if (Gate::allows('is-admin')) {
        Dzija::findOrFail($id)->delete();
        return redirect('admindzija');
    }
    else {
            return redirect('dashboard')->withErrors('Access denied');
        }
    }
}
