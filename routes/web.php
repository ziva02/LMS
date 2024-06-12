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
use App\Http\Controllers\UserController;
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
Route::get('/edit-profile', [UserController::class, 'editProfile'])->name('edit-profile');
Route::put('/update-profile/{id}', [UserController::class, 'updateProfile'])->name('update-profile');



Route::get('rataNIlai', [MentorController::class, 'AverageNilai'])->name('expnilai');;



Route::get('/tugas/{id}/detail', [CourseController::class, 'tugasdetail'])->name('tugas.detail');
Route::put('/tugas/{id}/update', [CourseController::class, 'updatetugas'])->name('tugas.update');
Route::post('/courses/{id}/tugas/store', [CourseController::class, 'storetugas'])->name('tugas.store');
Route::delete('/tugas/{id}', [CourseController::class, 'deletetugas'])->name('tugas.delete');

Route::post('/submit-tugas/{id}', [MenteeController::class, 'kumpul'])->name('submitTugas');
Route::get('/lihat-pengumpulan/{tugas_id}', [MentorController::class, 'lihatPengumpulan'])->name('lihatPengumpulan');
Route::get('/tidak-mengumpul/{tugas_id}', [MentorController::class, 'tidakkumpul'])->name('tidakkumpul');
Route::post('/isi-nilai/{id}', [MentorController::class, 'isiNilai'])->name('isiNilai');
Route::get('/datament', [MentorController::class, 'datamentee']);


Route::get('/beranda', [BerandaController::class, 'beranda'])->name('beranda');
Route::get('/landingmentor', [BerandaController::class, 'mentor'])->name('landingmentor');
Route::get('/landingwmi', [BerandaController::class, 'wmi'])->name('landingwmi');
Route::get('/landingmentee', [BerandaController::class, 'mentee'])->name('landingmentee');


Route::middleware(['role:0'])->group(function () {
    // Semua rute di dalam grup ini hanya bisa diakses oleh mentee

    Route::get('/datamentor', [MentorController::class, 'index'])->name('datamentor');
    Route::get('wmi/mentor/add', [MentorController::class, 'add']);
    Route::post('wmi/mentor/add', [MentorController::class, 'insert']);

    Route::get('wmi/mentor/edit/{id}', [MentorController::class, 'edit'])->name('edit.mentor');
    Route::put('wmi/mentor/edit/{id} ', [MentorController::class, 'update'])->name('update.mentor');
    Route::delete('/wmi/mentor/delete/{id}', [MentorController::class, 'delete'])->name('delete.mentor');

    Route::get('/datamentee', [MenteeController::class, 'index'])->name('datamentee');
    Route::get('wmi/mentee/add', [MenteeController::class, 'add']);
    Route::post('wmi/mentee/add', [MenteeController::class, 'insert']);

    Route::get('wmi/mentee/edit/{id}', [MenteeController::class, 'edit'])->name('edit.mentee');
    Route::put('wmi/mentee/edit/{id} ', [MenteeController::class, 'update'])->name('update.mentee');
    Route::delete('/wmi/mentee/delete/{id}', [MenteeController::class, 'delete'])->name('delete.mentee');
    Route::get('/submit-tugas', [MenteeController::class, 'showSubmitTugasPage'])->name('submit_tugas');

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
    Route::post('/link_pertemuan/store', [CourseController::class, 'storelink'])->name('link_pertemuan.store');

    Route::get('/pengumumann', [PengumumannController::class, 'index'])->name('pengumuman');
    Route::post('/pengumumann', [PengumumannController::class, 'store'])->name('pengumuman.store');

    Route::get('/pengumumann/{id}/edit', [PengumumannController::class, 'edit'])->name('pengumuman.edit');
    Route::put('/pengumumann/{id}', [PengumumannController::class, 'update'])->name('pengumuman.update');
    Route::delete('/pengumumann/{id}', [PengumumannController::class, 'delete'])->name('pengumuman.delete');

});
Route::get('/course', [CourseController::class, 'index'])->name('course');
Route::post('wmi/course/tambah', [CourseController::class, 'insert'])->name('addcourse');
Route::get('wmi/course/add', [CourseController::class, 'add']);
Route::delete('/wmi/course/delete/{id}', [CourseController::class, 'delete'])->name('delete.course');
Route::get('wmi/course/{id}/edit', [CourseController::class, 'edit'])->name('edit.course');
Route::put('wmi/course/{id}', [CourseController::class, 'update'])->name('update.course');



Route::middleware(['role:2'])->group(function () {
    Route::get('/coursementee', [CourseController::class, 'indexmentee'])->name('coursementee');
    Route::get('/nilaiakhir', [MenteeController::class, 'nilaiakhir'])->name('nilaimentee');
    Route::get('/sertifikat/{course_id}', [MenteeController::class, 'sertifikat'])->name('sertifikat');
    Route::get('/sertifikat/{course_id}/download', [MenteeController::class, 'downloadSertifikat'])->name('sertifikat.download');


});

Route::middleware(['role:1'])->group(function () {
    Route::get('/coursementor', [CourseController::class, 'indexmentor'])->name('coursementor');
    // Route::get('/course', [CourseController::class, 'index'])->name('course');

});


Route::get('/courses/{id}/detail', [CourseController::class, 'coursedetail'])->name('courses.detail');
Route::get('/courses/{id}/link-pertemuan', [CourseController::class, 'linkPertemuanDetail'])->name('link_pertemuan.detail');








Route::get('/home', [HomeController::class, 'index'])->name('home');



// Route::get('/blogg', function () {
//     return view('blogg');
// });



Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/', [CourseController::class, 'show'])->name('login');
Route::post('/masuk', [CourseController::class, 'login'])->name('loginn');









