<?php

namespace App\Http\Controllers;
use App\Models\Izstradajums;
use App\Models\Veids;


use Illuminate\Http\Request;

class AdminIzstradajumiController extends Controller
{
    public function index()
    {
        $izstradajumi = Izstradajums::all();
        return view('adminizstradajumi',  compact('izstradajumi'));
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
    public function create()
    {
        return view('jaunsizstradajums');
    }
    /**
     * Saglabāt jaunizveidoto izstrādājumu DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * izdzēst.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $veids_id = Izstradajums::findOrFail($id)->veids_id;
        Izstradajums::findOrFail($id)->delete();
        return redirect('adminizstradajumi');
    }
}
