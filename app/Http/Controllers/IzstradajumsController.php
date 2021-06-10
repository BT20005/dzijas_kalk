<?php

namespace App\Http\Controllers;

use App\Models\Izstradajums;
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
}
