<?php

namespace App\Http\Controllers;

use App\Models\Dzija;
use Illuminate\Http\Request;

class DzijaController extends Controller
{
    public function index()
    {
    $countries=Dzija::all();
    return view('dzijas', compact('dzijas'));
    }
}
