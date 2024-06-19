<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\user;
use App\Models\Materi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Course;

class BerandaController extends Controller
{
    //
    public function beranda()
    {
        $header_title = "Beranda";
        $pengumumans = Pengumuman::latest()->take(3)->get();
        return view('WMI.beranda', compact('header_title', 'pengumumans'));
    }

    public function mentor()
    {
        $header_title = "Beranda";
        $pengumumans = Pengumuman::latest()->take(3)->get();
        $landing = User::where('is_admin', 2)->count();
        return view('landing.landingmentor', compact('header_title', 'landing', 'pengumumans'));
    }

    public function wmi()
    {
        $header_title = "Beranda";
        $landing = User::where('is_admin', 2)->count();
        $mentor = User::where('is_admin', 1)->count();
        $materi = Materi::all()->count();
        $pengumumans = Pengumuman::latest()->take(3)->get();
        return view('landing.landingwmi', compact('header_title', 'landing', 'mentor', 'materi', 'pengumumans'));
    }

    public function mentee()
    {
        $header_title = "Beranda";

        // Ambil user yang sedang login
        $loggedInUser = Auth::user();
        $pengumumans = Pengumuman::latest()->take(3)->get();

        // Inisialisasi variabel $mentor
        $mentor = [];

        // Periksa apakah user yang sedang login adalah is_admin 2
        if ($loggedInUser->is_admin == 2) {
            // Ambil role dari user yang sedang login
            $role = $loggedInUser->role;

            // Ambil nama dari is_admin 1 dengan role yang sama
            $mentor = User::where('is_admin', 1)
                ->where('role', $role)
                ->pluck('name');
        }

        // Hitung jumlah mentor
        $totalMentor = $mentor->count();

        // Ambil tugas yang cocok dengan role user yang sedang login
        $tugasmentee = DB::table('tugas')
            ->join('course', 'tugas.course_id', '=', 'course.id')
            ->where('course.user_role', $loggedInUser->role) // Filter berdasarkan role user yang sedang login
            ->select('tugas.judul_tugas', 'course.name')
            ->distinct() // Mengambil hanya tugas yang unik
            ->paginate(5); // Menambahkan titik koma yang hilang

        $tugasBelumDikumpul = DB::table('tugas')
            ->join('course', 'tugas.course_id', '=', 'course.id')
            ->leftJoin('tugas_mentee', function ($join) use ($loggedInUser) {
                $join->on('tugas.id', '=', 'tugas_mentee.tugas_id')
                    ->where('tugas_mentee.user_id', '=', $loggedInUser->id);
            })
            ->where('course.user_role', $loggedInUser->role)
            ->whereNull('tugas_mentee.tugas_file') // Filter untuk tugas yang belum dikumpulkan
            ->select('tugas.id', 'tugas.judul_tugas', 'course.name')
            ->distinct()
            ->paginate(5);

        // Fetch the course data
        $coursesQuery = Course::join('users', function ($join) {
            $join->on('course.user_role', '=', 'users.role')
                ->where('users.id', auth()->user()->id);
        })->select('course.*')->get(); // Use get() to fetch the data

        return view('landing.landingmentee', compact('header_title', 'mentor', 'tugasmentee', 'totalMentor', 'pengumumans', 'tugasBelumDikumpul', 'coursesQuery'));
    }




    //     public function beranda()
//     {
//         $header_title = "Beranda LMS";
//         $pengumumans = Pengumuman::latest()->take(3)->get();
//         return view('WMI.beranda', compact('header_title','pengumumans'));
//     }
// z
}
