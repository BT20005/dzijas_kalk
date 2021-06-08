<?php

namespace App\Http\Controllers;

use App\Models\Izstradajums;
use Illuminate\Http\Request;

class IzstradajumsController extends Controller
{
     // public function __construct() {
    //     // only Admins have access to the following methods
    //     $this->middleware('auth.admin')->only(['create', 'store']);
    //     // only authenticated users have access to the methods of the controller
    //     $this->middleware('auth');
    // }
        
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
}
