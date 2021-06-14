<?php

namespace App\Http\Controllers;
use App\Models\Dzija;
use App\Models\Izstradajums;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use function redirect;
use function view;

class KalkulacijasController extends Controller
{
    public function index()
    {
        $dzijas = Dzija::orderBy('nosaukums')->get();
        return view('kalculacijas',  compact('dzijas'));
    }
}
