<?php

namespace App\Http\Controllers;

use App\Models\Veids;
use App\Models\Izstradajums;
use Illuminate\Http\Request;

class VeidsController extends Controller
{
    public function __construct() {
        $this->middleware('auth.admin')->only(['edit', 'create', 'store']);
    //     // only Admins have access to the following methods
    //     $this->middleware('auth.admin')->only(['create', 'store']);
    //     // only authenticated users have access to the methods of the controller
    //     $this->middleware('auth');
    }
    public function index()
    {
        $veidi = Veids::all();
        return view('veidi',  compact('veidi'));
    }
    /**
     * Forma jaunam izstrādājuma veidam.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jaunsveids');
    }

    /**
     * Saglabājam jaunizveidoto veidu DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'nosaukums' => 'required|string|min:2|max:50|unique:veids',
        );        
        $this->validate($request, $rules); 
        
        $veids = new Veids();
        $veids->nosaukums = $request->nosaukums;
        $veids->save();        
        return redirect()->route('veids.index');
    }

    /**
     * Attēlojam.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $veids = Veids::findOrFail($id);
        $izstradajums = $veids->izstradajumi;
        return view('izstradajumi', compact('izstradajumi', 'veids'));
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
        Izstradajums::where('veids_id',$id)->delete();
        Veids::findOrFail($id)->delete();
        return redirect('veids');
    }
}
