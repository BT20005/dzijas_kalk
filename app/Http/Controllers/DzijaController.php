<?php

namespace App\Http\Controllers;

use App\Models\Dzija;
use App\Models\Razotajs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DzijaController extends Controller
{
    // public function __construct() {
    //     // only Admins have access to the following methods
    //     $this->middleware('auth.admin')->only(['create', 'store']);
    //     // only authenticated users have access to the methods of the controller
    //     $this->middleware('auth');
    // }
        
    /**
     * Dziju saraksts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dzijas = Dzija::orderBy('nosaukums')->get();
        return view('dzijas',  compact('dzijas'));
    }

    /**
     * Forma jaunas dzijas izveidei.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $razotaji = Razotajs::all()->map(function ($razotajs) {
            $razotajs->value = $razotajs->id;
            return $razotajs;
	   });
        return view('dzija_create', compact('razotaji'));
    }

    /**
     * Saglabāt jaunizveidotās dzijas.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Responses
     */
    public function store(Request $request)
    {
        $rules = array(
            'nosaukums' => 'required|string|min:2|max:191',
            'garums' => 'required|digits:4|integer|max:9999',
            'apraksts' => 'nullable|string',
            'razotajs' => 'required|exists:razotajs_id',
        );        
        $this->validate($request, $rules); 
        
        $dzija = new Dzija();
        $dzija->nosaukums = $request->nosaukums;
        $dzija->garums = $request->garums;
        $dzija->apraksts = $request->apraksts;
        $dzija->razotajs()->associate(Razotajs::findOrFail($request->razotajs));
        $dzija->save();
        return redirect()->route('dzija.index');        
    }

    /**
     * Attēlot.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dzija = Dzija::findOrFail($id);
        $reserved = 0;
        if (session()->has('dzija') && in_array($id, session()->get('dzija'))) {
            $reserved = 1;
        }
        return view('dzija', compact('dzija'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function showFilter() 
    {      
        $razotaji = Razotajs::all()->map(function ($razotajs) {
            $razotajs->value = $razotajs->id;
            return $razotajs;
	   });
        return view('dzijas_filter', compact('razotaji'));        
    }
    
    public function filter(Request $request)
    {
             
        if ($request->garums_from != null) {
            $garums_from = $request->garums_from;
            $rules = array(
                'nosaukums' => 'nullable|string|min:2|max:191',
                'garums_from' => 'nullable|digits:4|integer|max:9999',
                'garums_until' => 'nullable|digits:4|integer|max:9999|gte:'.$garums_from,
                'razotajs' => 'nullable|exists:razotajs,id',
            );   
        }
        else {
            $rules = array(
                'nosaukums' => 'nullable|string|min:2|max:191',
                'garums_from' => 'nullable|digits:4|integer|max:9999',
                'garums_until' => 'nullable|digits:4|integer|max:9999',
                'razotajs' => 'nullable|exists:razotajs,id',
            );   
        }
            
        $this->validate($request, $rules); 

        $query = Dzija::join('dzija_by_razotajs', 'dzija_by_razotajs.dzija_id', '=', 'dzija.id');
        if ($request->razotajs != null) {
            $query = $query->whereIn('dzija.razotajs_id',$request->razotajs);
        } 

        if ($request->nosaukums != null) {
            $query = $query->where('dzijas.nosaukums', 'LIKE', '%'.$request->nosaukums.'%');
        }

        if ($request->garums_from != null) {
            $query = $query->where('dzijas.garums', '>=', $request->garums_from);
        }

        if ($request->garums_until != null) {
            $query = $query->where('dzijas.garums', '<=', $request->garums_until);
        }

        if ($request->apraksts != null) {
            $query = $query->where('dzijas.apraksts', 'LIKE', '%'.$request->apraksts.'%');
        }
        
        $query = $query->select(DB::raw('distinct dzijas.*'));

        return view('dzijas', array('dzijas' => $query->orderBy('nosaukums')->get()));        
    }
}

