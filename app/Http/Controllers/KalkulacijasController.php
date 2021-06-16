<?php

namespace App\Http\Controllers;
use App\Models\Dzija;
use App\Models\Izstradajums;
use App\Models\Veids;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

use function view;

class KalkulacijasController extends Controller
{
    public function __construct() {

   //     // only Admins have access to the following methods
   //     $this->middleware('auth.admin')->only(['create', 'store']);
       // only authenticated users have access to the methods of the controller
       $this->middleware('auth');
   }
    // public function index() 
    // {
    //     $dzijas = DB::table('kalkulacijas')
    //                 ->groupBy('veids')
    //                 ->get();
    //     return view('kalkulacijas')->with('dzijas', $dzijas);
    // }
    // public function index() 
    // {
    //     $dzijas = Dzija::all();
    //     $veidi = Veids::all();
    //     return view('kalkulacijas', compact('veidi', 'dzijas'));
    // }
    public function index()
    {
        $dzijas = Dzija::sort('nosaukums')->get();
        $veidi = Veids::sort('nosaukums')->get();
        $izmeri = Izstradajums::select('izmers')->get();
        return view('kalkulacijas',  compact('dzijas', 'izmeri', 'veidi'));
    }
    public function showIzstr($id)
    {
        $izstradajums = Izstradajums::where('veids_id', $id)->pluck("nosaukums", "id");
        return json_encode($izstradajums);
    }
    public function show($id)
    {
        $dzijas = Dzija::all()->map(function ($dzija) {
            $dzija->value = $dzija->id;
            return $dzija;
       });
        $veidi = Veids::all()->map(function ($veids) {
            $veids->value = $veids->id;
            return $veids;
        });
        $izmeri = Izstradajums::all()->map(function ($izstradajums) {
            $izstradajums->value = $izstradajums->id;
            return $izstradajums;
        });
        return view('kalkulacijas', compact('dzijas','veidi', 'izmeri'));
    }
}
