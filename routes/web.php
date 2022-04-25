<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\informationcontroller;
use App\Http\Controllers\denahcontroller;
use App\Http\Controllers\denahsatulantaiduacon;
use App\Http\Controllers\dualantaisatucon;
use App\Http\Controllers\dualantaiduacon;
use App\Http\Controllers\komentarcontroller;

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

Route::get('/', function () {
    return view('index');
});
Route::get('/blogg', function () {
    return view('blogg');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/portfolio', function () {
    return view('portfolio');
});
Route::get('/kantin', [denahcontroller::class, 'kantin']);

Route::get('/tabel', [informationcontroller::class, 'tabel']);
Route::get('/createinformation', [informationcontroller::class, 'createinformation']);
Route::get('/edittabel/edit/{id}', [informationcontroller::class, 'edit']);
Route::post('createinformation/store', [informationcontroller::class, 'store'])->name('tambah.store');
Route::post('tabel/update/{id}', [informationcontroller::class, 'update'])->name('tabel.update');
Route::get('tabel/delete/{id}', [informationcontroller::class, 'delete'])->name('tabel.delete');

Route::get('/tabeldenah', [denahcontroller::class, 'tabeldenah']);

Route::get('/createkantinsatu', [denahcontroller::class, 'createkantinsatu']);
Route::post('createkantinsatu/storee', [denahsatulantaiduacon::class, 'storee'])->name('kantinsatu.storee');
Route::get('tabeldenah/delete/{id}', [denahcontroller::class, 'delete'])->name('kantinsatu.delete');
Route::get('/editkantinsatu/edit/{id}', [denahcontroller::class, 'edit']);
Route::post('tabeldenah/update/{id}', [denahcontroller::class, 'update'])->name('kantinsatu.update');

Route::get('/tabeldenahsatulantaidua', [denahsatulantaiduacon::class, 'tabeldenahsatulantaidua']);
Route::get('/createkantinsatulantaidua', [denahsatulantaiduacon::class, 'createkantinsatulantaidua']);
Route::post('createkantinsatu/store', [denahsatulantaiduacon::class, 'store'])->name('kantinsatulantaidua.store');
Route::get('tabeldenahsatulantaidua/delete/{id}', [denahsatulantaiduacon::class, 'delete'])->name('kantinsatulantaidua.delete');
Route::get('/editkantinsatulantaidua/edit/{id}', [denahsatulantaiduacon::class, 'edit']);
Route::post('tabeldenahsatulantaidua/update/{id}', [denahsatulantaiduacon::class, 'update'])->name('kantinsatulantaidua.update');


Route::get('/tabeldenahdualantaisatu', [dualantaisatucon::class, 'tabeldenahdualantaisatu']);
Route::get('/createkantindualantaisatu', [dualantaisatucon::class, 'createkantindualantaisatu']);
Route::post('createkantindualantaisatu/store', [dualantaisatucon::class, 'store'])->name('kantindualantaisatu.store');
Route::get('tabeldenahdualantaisatu/delete/{id}', [dualantaisatucon::class, 'delete'])->name('kantindualantaisatu.delete');
Route::get('/editkantindualantaisatu/edit/{id}', [dualantaisatucon::class, 'edit']);
Route::post('tabeldenahdualantaisatu/update/{id}', [dualantaisatucon::class, 'update'])->name('kantindualantaisatu.update');

Route::get('/tabeldenahdualantaidua', [dualantaiduacon::class, 'tabeldenahdualantaidua']);
Route::get('/createkantindualantaidua', [dualantaiduacon::class, 'createkantindualantaidua']);
Route::post('createkantindualantaidua/store', [dualantaiduacon::class, 'store'])->name('kantindualantaidua.store');
Route::get('tabeldenahdualantaidua/delete/{id}', [dualantaiduacon::class, 'delete'])->name('kantindualantaidua.delete');
Route::get('/editkantindualantaidua/edit/{id}', [dualantaiduacon::class, 'edit']);
Route::post('tabeldenahdualantaidua/update/{id}', [dualantaiduacon::class, 'update'])->name('kantindualantaidua.update');

Route::get('/tabelkomentar', [komentarcontroller::class, 'tabelkomentar']);