<?php
//use App\Http\Controllers\Request;

//use Illuminate\Support\Facades\Lang;
//use Illuminate\Foundation\Http\FormRequest;

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;
use function cookie;
use function redirect;


class LanguageController extends Controller
{
    
    public function __invoke(Request $request, $locale)
    {
       
        return redirect()->back()->withCookie (cookie()->forever('language', $locale));
    }
}