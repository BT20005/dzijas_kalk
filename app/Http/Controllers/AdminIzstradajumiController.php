<?php

namespace App\Http\Controllers;
use App\Models\Izstradajums;
use App\Models\Veids;
use App\Models\Dzija;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class AdminIzstradajumiController extends Controller
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
        if (Gate::allows('is-admin')) {
        $izstradajumi = Izstradajums::all();
        return view('adminizstradajumi',  compact('izstradajumi'));
        }
        else {
            return redirect('/')->withErrors('Nav piekļuves');
        }
    }

    // public function index($id)
    // {
    // $izstradajumi = Izstradajums::where('veids_id','=',$id)->get();
    // return view('izstradajumi',['veids_id'=>$id,'izstradajumi'=>$izstradajumi]);
    // }
    /**
     * Forma jaunam izstrādājumam.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('is-admin')) {
            $adminizstradajumi = Dzija::find($id);
            return view ('edit', compact('adminizstradajumi'));
        }
        else {
            return redirect('dashboard')->withErrors('Access denied');
        }
    }
    
    public function create()
    {
         if (Gate::allows('is-admin')) {
            $veidi = Veids::all()->map(function ($veids) {
                $veids->value = $veids->id;
                return $veids;
           });
        return view('jaunsizstradajums', compact('veidi'));
        }
        else {
            return redirect('dashboard')->withErrors('Access denied');
        }
    }
    /**
     * Saglabāt jaunizveidoto izstrādājumu DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::allows('is-admin')){
        $rules = array(
            'nosaukums' => 'required|string|min:2|max:50|unique:izstradajums',
            'apraksts' => 'nullable|string',
            'izmers' => 'required|digits:4|integer|max:9999',
            'garums' => 'required|digits:4|integer|max:9999',
            'veids' => 'required|exists:veids_id',
        );        
        $this->validate($request, $rules); 
        
        $izstradajums = new Izstradajums();
        $izstradajums->nosaukums = $request->nosaukums;
        $izstradajums->apraksts = $request->apraksts;
        $izstradajums->izmers = $request->izmers;
        $izstradajums->garums = $request->garums;
        $izstradajums->veids()->associate(Veids::findOrFail($request->veids));
        $izstradajums->save();        
        return redirect()->route('izstradajums.index');
    }
        else {
            return redirect('dashboard')->withErrors('Access denied');
        }
    }

    /**
     * izdzēst.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('is-admin')) {
        $veids_id = Izstradajums::findOrFail($id)->veids_id;
        Izstradajums::findOrFail($id)->delete();
        return redirect('adminizstradajumi');
    }
    else {
            return redirect('dashboard')->withErrors('Access denied');
        }
    }
}
