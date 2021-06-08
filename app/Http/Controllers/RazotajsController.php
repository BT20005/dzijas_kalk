<?php

namespace App\Http\Controllers;

use App\Models\Razotajs;
use Illuminate\Http\Request;

class RazotajsController extends Controller
{
   
    // public function __construct() {
    //     // only Admins have access to the following methods
    //     $this->middleware('auth.admin')->only(['create', 'store']);
    //     // only authenticated users have access to the methods of the controller
    //     $this->middleware('auth');
    // }
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
        return view('razotajs_create');
    }

    /**
     * Saglabāt jaunirveidoto ražotāju DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'nosaukums' => 'required|string|min:2|max:50|unique:razotaji',
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
        $dzija = $razotajs->dzijas;
        return view('dzijas', compact('dzijas', 'razotajs'));
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
}
