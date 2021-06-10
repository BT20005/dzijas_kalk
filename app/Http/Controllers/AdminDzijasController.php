<?php

namespace App\Http\Controllers;
use App\Models\Dzija;
use App\Models\Razotajs;

use Illuminate\Http\Request;

class AdminDzijasController extends Controller
{
    public function index()
    {
        $dzijas = Dzija::all();
        return view('admindzijas',  compact('dzijas'));
    }

    // public function index($id)
    // {
    // $dzijas = Dzija::where('razotajs_id','=',$id)->get();
    // return view('dzijas',['razotajs_id'=>$id,'izstradajumi'=>$dzijas]);
    // }
    /**
     * Forma jaunai dzijai.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jaunadzija');
    }
    /**
     * Saglabāt jaunizveidoto dziju DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * izdzēst.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $razotajs_id = Dzija::findOrFail($id)->razotajs_id;
        Dzija::findOrFail($id)->delete();
        return redirect('admindzija');
    }
}
