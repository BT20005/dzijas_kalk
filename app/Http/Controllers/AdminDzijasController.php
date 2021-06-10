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
       $this->middleware('auth.admin')->only(['edit']);
       //$this->middleware('auth.admin')->only(['edit', 'create', 'store', 'destroy']);
        //$this->middleware('auth', ['only'=>'edit']);
    //only Admins have access to the following methods
        // $this->middleware('auth.admin')->only(['create', 'store']);
         // only authenticated users have access to the methods of the controller
        //$this->middleware('auth');
     }
    public function index()
    {
        $dzijas = Dzija::all();
        return view('admindzijas',  compact('dzijas'));
    }

    // public function index($id)
    // {
    // $izstradajumi = Izstradajums::where('veids_id','=',$id)->get();
    // return view('izstradajumi',['veids_id'=>$id,'izstradajumi'=>$izstradajumi]);
    // }
    /**
     * Forma jaunai dzijai.
     *
     * @return Response
     */
    public function edit($id)
    {
        if (Gate::allows('is-admin')) {
            $admindzijas = Dzija::find($id);
            return view ('edit', compact('admindzijas'));
        }
        else {
            return redirect('dashboard')->withErrors('Access denied');
        }
    }
    
    public function create()
    {   
        if (Gate::allows('is-admin')) {
        return view('jaunadzija');
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
            'nosaukums' => 'required|string|min:2|max:50|unique:izstradajums',
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
        return redirect()->route('dzija.index');
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
        $razotajs_id = Dzija::findOrFail($id)->razotajs_id;
        Dzija::findOrFail($id)->delete();
        return redirect('admindzija');
    }
    else {
            return redirect('dashboard')->withErrors('Access denied');
        }
    }
}
