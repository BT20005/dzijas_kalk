<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\VeidsController;
use App\Http\Controllers\RazotajsController;
use App\Http\Controllers\DzijaController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\IzstradajumsController;
use App\Http\Controllers\AdminIzstradajumiController;
use App\Http\Controllers\AdminDzijasController;
use App\Http\Controllers\KalkulacijasController;
use App\Http\Controllers\Auth\SocialController as AuthSocialController;
use Laravel\Socialite\Facades\Socialite;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('sakums');
 //})->middleware(['auth'])->name('/');
});

Route::get('/admin', function () {
    return view('admin');
});
//Route::redirect('/', 'sakums');
// Route::get('/dzija', function () {
//     return view('dzija');
// });
Route::get('/kalkulators', function () {
    return view('kalkulators');
});
// Route::get('/kalkulacijas', function () {
//     return view('kalkulacijas');
// });
Route::resource('veids', VeidsController::class);
Route::resource('razotajs', RazotajsController::class);
Route::resource('dzijas', DzijaController::class);
Route::resource('izstradajumi', IzstradajumsController::class);
Route::resource('adminizstradajumi', AdminIzstradajumiController::class);
Route::resource('admindzijas', AdminDzijasController::class);
Route::resource('kalkulacijas', KalkulacijasController::class);


Route::get('kalkulacijas/filter', [KalkulacijasController::class, 'showFilter'])->name('dzijas.filter');
Route::post('dzijas/filter', [KalkulacijasController::class, 'filter']);

Route::get('/dzija/{id}', [DzijaController::class, 'show']);
Route::get('/izstradajums/{id}', [IzstradajumsController::class, 'show']);

//Route::resource('adminizstradajumi', AdminIzstradajumiController::class, ['except' => ['index', 'create']]);
// Route::get('adminizstradajumi/veids/{id}', [AdminIzstradajumiController::class, 'index']);

Route::resource('admindzijas', AdminDzijasController::class, ['except' => ['index', 'create']]);
Route::get('admindzijas/veids/{id}', [AdminDzijasController::class, 'index']);



Route::get('/social-auth/{provider}', [AuthSocialController::class, 'redirectToProvider'])->name('auth.social');

Route::get('/social-auth/{provider}/callback', [AuthSocialController::class, 'handleProviderCallback'])->name('auth.social.callback');

Route::get('lang/{locale}', LanguageController::class);

//Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);


//Route::get('/auth/callback', function () {
//    $user = Socialite::driver('facebook')->user();
//
//    // $user->token
//});
//
//Route::get('/auth/redirect', function () {
//    return Socialite::driver('google')->redirect();});
//
//Route::get('/auth/callback', function () {
//    $user = Socialite::driver('google')->user();
//
//    // $user->token
//});
