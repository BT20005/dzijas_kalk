<?php

namespace App\Http\Controllers;

use App\Models\Izstradajums;
use App\Models\Dzija;
use App\Models\Veids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class IzstradajumsController extends Controller
{
     public function __construct() {
         $this->middleware('auth.admin')->only(['edit']);
         //$this->middleware('auth.admin')->only(['edit', 'create', 'store']);
    //     // only Admins have access to the following methods
    //     $this->middleware('auth.admin')->only(['create', 'store']);
    //     // only authenticated users have access to the methods of the controller
    //     $this->middleware('auth');
    }
        
    /**
     * izstrādājumu saraksts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $izstradajumi = Izstradajums::orderBy('nosaukums')->get();
        return view('izstradajumi',  compact('izstradajumi'));
    }
    
   public function edit($id)
    { 
    if (Gate::allows('is-admin')) {
            $izstradajums = Dzija::find($id);
            return view ('edit', compact('izstradajums'));
        }
        else {
            return redirect('dashboard')->withErrors('Access denied');
        }
    }
    /**
     * Attēlot.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $izstradajums = Izstradajums::findOrFail($id);
        return view('izstradajums', compact('izstradajums'));
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
            'veids' => 'required|exists:veids,id',
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
}
