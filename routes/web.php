<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\informationcontroller;
use App\Http\Controllers\denahcontroller;
use App\Http\Controllers\denahsatulantaiduacon;
use App\Http\Controllers\dualantaisatucon;
use App\Http\Controllers\dualantaiduacon;
use App\Http\Controllers\komentarcontroller;
use App\Http\Controllers\produkcontroller;
use App\Http\Controllers\izincontroller;
use App\Http\Controllers\tengahcon;
use App\Http\Controllers\jadwalsatusatu;
use App\Http\Controllers\jadwalsatudua;


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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/blogg', function () {
    return view('blogg');
});

Route::get('/masuk', function () {
    return view('masuk');
});





Route::get('/', [informationcontroller::class, 'about']);







Route::group(['middleware' => ['auth']], function () {
    Route::get('/blog', [komentarcontroller::class, 'blog']);
    Route::post('blog/store', [komentarcontroller::class, 'store'])->name('blog.store');
    Route::get('/contact', [produkcontroller::class, 'contact']);
    
    
    Route::get('/tabelizin', [izincontroller::class, 'tabelizin']);
    Route::get('tabelizin/delete/{id}', [izincontroller::class, 'delete'])->name('izin.delete');

    Route::get('/kantin', [denahcontroller::class, 'kantin']);
    Route::get('/kantinsatudua', [denahsatulantaiduacon::class, 'kantinsatudua']);
    Route::get('/kantinduasatu', [dualantaisatucon::class, 'kantinduasatu']);
    Route::get('/kantinduadua', [dualantaiduacon::class, 'kantinduadua']);
    Route::get('/kantintengah', [tengahcon::class, 'kantintengah']);

    
    Route::post('portfolio/store', [izincontroller::class, 'store'])->name('izin.store');
    Route::get('/jadwalpiket', [jadwalsatusatu::class, 'jadwalpiket']);

    Route::get('/portfolio', function () {
        return view('portfolio');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'admin']], function () {
   
   
   

});

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

Route::get('/tabeltengah', [tengahcon::class, 'tabeltengah']);
Route::get('/createkantintengah', [tengahcon::class, 'createkantintengah']);
Route::post('createkantintengah/store', [tengahcon::class, 'store'])->name('kantintengah.store');
Route::get('tabeltengah/delete/{id}', [tengahcon::class, 'delete'])->name('tengah.delete');
Route::get('/editkantintengah/edit/{id}', [tengahcon::class, 'edit']);
Route::post('tabeltengah/update/{id}', [tengahcon::class, 'update'])->name('tengah.update');


Route::get('/tabelkomentar', [komentarcontroller::class, 'tabelkomentar']);


Route::get('/tabelproduk', [produkcontroller::class, 'tabelproduk']);
Route::get('/createproduk', [produkcontroller::class, 'createproduk']);
Route::post('createproduk/store', [produkcontroller::class, 'store'])->name('produk.store');
Route::get('tabelproduk/delete/{id}', [produkcontroller::class, 'delete'])->name('produk.delete');
Route::get('/editproduk/edit/{id}', [produkcontroller::class, 'edit']);
Route::post('tabelproduk/update/{id}', [produkcontroller::class, 'update'])->name('produk.update');

Route::get('/tabeljadwalkantinsatusatu', [jadwalsatusatu::class, 'tabeljadwalkantinsatusatu']);
Route::get('/editjadwalsatusatu/edit/{id}', [jadwalsatusatu::class, 'edit']);
Route::post('tabeljadwalkantinsatusatu/update/{id}', [jadwalsatusatu::class, 'update'])->name('jadwal.update');


Route::get('/tabeljadwalkantinsatudua', [jadwalsatusatu::class, 'tabeljadwalkantinsatudua']);
Route::get('/editjadwalsatudua/edit/{id}', [jadwalsatusatu::class, 'editsatudua']);
Route::post('tabeljadwalkantinsatudua/update/{id}', [jadwalsatusatu::class, 'updatesatudua'])->name('jadwalsatudua.update');

Route::get('/tabeljadwalkantintengah', [jadwalsatusatu::class, 'tabeljadwalkantintengah']);
Route::get('/editjadwaltengah/edit/{id}', [jadwalsatusatu::class, 'edittengah']);
Route::post('tabeljadwalkantitengah/update/{id}', [jadwalsatusatu::class, 'updatetengah'])->name('jadwaltengah.update');

Route::get('/tabeljadwalkantinduasatu', [jadwalsatusatu::class, 'tabeljadwalkantinduasatu']);
Route::get('/editjadwalduasatu/edit/{id}', [jadwalsatusatu::class, 'editduasatu']);
Route::post('tabeljadwalkantiduasatu/update/{id}', [jadwalsatusatu::class, 'updateduasatu'])->name('jadwalduasatu.update');

Route::get('/tabeljadwalkantinduadua', [jadwalsatusatu::class, 'tabeljadwalkantinduadua']);
Route::get('/editjadwalduadua/edit/{id}', [jadwalsatusatu::class, 'editduadua']);
Route::post('tabeljadwalkantiduadua/update/{id}', [jadwalsatusatu::class, 'updateduadua'])->name('jadwalduadua.update');

