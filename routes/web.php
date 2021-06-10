<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\VeidsController;
use App\Http\Controllers\RazotajsController;
use App\Http\Controllers\DzijaController;
use App\Http\Controllers\IzstradajumsController;
use App\Http\Controllers\AdminIzstradajumiController;
use App\Http\Controllers\AdminDzijasController;
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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('sakums');
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
Route::resource('veids', VeidsController::class);
Route::resource('razotajs', RazotajsController::class);
Route::resource('dzijas', DzijaController::class);
Route::resource('izstradajumi', IzstradajumsController::class);
Route::resource('adminizstradajumi', AdminIzstradajumiController::class);
Route::resource('admindzijas', AdminDzijasController::class);

// Route::resource('adminizstradajumi', AdminIzstradajumiController::class, ['except' => ['index', 'create']]);
// Route::get('adminizstradajumi/veids/{id}', [AdminIzstradajumiController::class, 'index']);

Route::resource('admindzijas', AdminDzijasController::class, ['except' => ['index', 'create']]);
Route::get('admindzijas/veids/{id}', [AdminDzijasController::class, 'index']);

Route::get('dzijas/filter', [BookController::class, 'showFilter'])->name('dzijas.filter');
Route::post('dzijas/filter', [BookController::class, 'filter']);
