<?php

use App\Http\Controllers\BerandaController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\informationcontroller;
use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\LoginController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PengumumannController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenteeController;
use App\Http\Middleware\RoleMiddleware;



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

Route::middleware([RoleMiddleware::class . ':0'])->group(function () {
    // Semua rute di dalam grup ini hanya bisa diakses oleh mentee
    Route::get('/beranda', [BerandaController::class, 'beranda']);

    Route::get('/datamentor', [MentorController::class, 'index'])->name('datamentor');
    Route::get('WMI/Mentor/add', [MentorController::class, 'add']);
    Route::post('WMI/Mentor/add', [MentorController::class, 'insert']);

    Route::get('WMI/Mentor/edit/{id}', [MentorController::class, 'edit'])->name('edit.mentor');
    Route::put('WMI/Mentor/edit/{id} ', [MentorController::class, 'update'])->name('update.mentor');
    Route::delete('/WMI/Mentor/delete/{id}', [MentorController::class, 'delete'])->name('delete.mentor');

    Route::get('/datamentee', [MenteeController::class, 'index'])->name('datamentee');
    Route::get('WMI/Mentee/add', [MenteeController::class, 'add']);
    Route::post('WMI/Mentee/add', [MenteeController::class, 'insert']);

    Route::get('WMI/Mentee/edit/{id}', [MenteeController::class, 'edit'])->name('edit.mentee');
    Route::put('WMI/Mentee/edit/{id} ', [MenteeController::class, 'update'])->name('update.mentee');
    Route::delete('/WMI/Mentee/delete/{id}', [MenteeController::class, 'delete'])->name('delete.mentee');

    Route::get('/course', [CourseController::class, 'index'])->name('course');
    Route::post('WMI/Course/tambah', [CourseController::class, 'insert'])->name('addcourse');
    Route::get('WMI/Course/add', [CourseController::class, 'add']);
    Route::delete('/WMI/Course/delete/{id}', [CourseController::class, 'delete'])->name('delete.course');
    Route::get('WMI/Course/{id}/edit', [CourseController::class, 'edit'])->name('edit.course');
    Route::put('WMI/Course/{id}', [CourseController::class, 'update'])->name('update.course');


    Route::get('/materi', [CourseController::class, 'coursedetail'])->name('coursedetail');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('course.detail');

    Route::get('/courses/{id}/detail', [CourseController::class, 'coursedetail'])->name('courses.detail');
    Route::get('/courses/{id}/link-pertemuan', [CourseController::class, 'linkPertemuanDetail'])->name('link_pertemuan.detail');


    Route::post('/courses/{id}/materi/store', [CourseController::class, 'storedetail'])->name('materi.store');

    Route::delete('/materi/{id}', [CourseController::class, 'deletedetail'])->name('materi.delete');
    Route::put('/materi/{id}', [CourseController::class, 'updatedetaill'])->name('materi.update');

    Route::get('/link_pertemuan/{id}/edit', [CourseController::class, 'editlink'])->name('link_pertemuan.edit');

    // Route untuk menyimpan perubahan setelah proses edit link pertemuan
    Route::put('/link_pertemuan/{id}', [CourseController::class, 'updatelink'])->name('link_pertemuan.update');
    Route::delete('/link_pertemuan/{id}', [CourseController::class, 'deleteLink'])->name('link.delete');







    Route::get('/pengumumann', [PengumumannController::class, 'index'])->name('pengumuman');
    Route::post('/pengumumann', [PengumumannController::class, 'store'])->name('pengumuman.store');

    Route::get('/pengumumann/{id}/edit', [PengumumannController::class, 'edit'])->name('pengumuman.edit');
    Route::put('/pengumumann/{id}', [PengumumannController::class, 'update'])->name('pengumuman.update');
    Route::delete('/pengumumann/{id}', [PengumumannController::class, 'delete'])->name('pengumuman.delete');


});



// Route::middleware([RoleMiddleware::class . ':1'])->group(function () {
//     Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
//     Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
// });





// Route::middleware([RoleMiddleware::class . ':2'])->group(function () {
//     Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
//     Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
// });




Route::get('/home', [HomeController::class, 'index'])->name('home');



// Route::get('/blogg', function () {
//     return view('blogg');
// });



Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/', [CourseController::class, 'show'])->name('login');
Route::post('/masuk', [CourseController::class, 'login'])->name('loginn');









