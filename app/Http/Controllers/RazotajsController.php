<?php

namespace App\Http\Controllers;

use App\Models\Razotajs;
use App\Models\Dzija;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RazotajsController extends Controller
{
   
    public function __construct() {
        $this->middleware('auth.admin')->only(['edit', 'create', 'store']);
        //$this->middleware('auth.admin')->only(['edit', 'create', 'store']);
    //     // only Admins have access to the following methods
    //     $this->middleware('auth.admin')->only(['create', 'store']);
    //     // only authenticated users have access to the methods of the controller
    //     $this->middleware('auth');
    }
    public function index()
    {
        $razotaji = Razotajs::all();
        return view('razotaji',  compact('razotaji'));
    }
    /**
     * Foma jaunam ražotājam.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jaunsrazotajs');
    }

    /**
     * Saglabāt jaunizveidoto ražotāju DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'nosaukums' => 'required|string|min:2|max:50|unique:razotajs',
        );        
        $this->validate($request, $rules); 
        
        $razotajs = new Razotajs();
        $razotajs->nosaukums = $request->nosaukums;
        $razotajs->save();        
        return redirect()->route('razotajs.index');
    }

    /**
     * Attēlot.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $razotajs = Razotajs::findOrFail($id);
        $dzija = $razotajs->dzija;
        return view('dzija', compact('dzija', 'razotajs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         if (Gate::allows('is-admin')) {
            $razotajs = Razotajs::find($id);
            return view ('edit', compact('razotajs'));
        }
        else {
            return redirect('dashboard')->withErrors('Access denied');
        }
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
     * izdzēst.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dzija::where('razotajs_id',$id)->delete();
        Razotajs::findOrFail($id)->delete();
        return redirect('razotajs');
    }
}
