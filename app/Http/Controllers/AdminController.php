<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use function redirect;
use function view;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth.admin')->only(['edit']);
    }
    /**
     * Saraksts.
     *
     */
    public function index()
    {
        if (Gate::allows('is-admin')) {
        return view('admin');
    }
        else {
        return redirect('dashboard')->withErrors('Access denied');
    }
}