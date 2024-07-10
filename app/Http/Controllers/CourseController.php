<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Link;
use App\Models\Materi;
use App\Models\Tugas;
use App\Models\TugasMentee;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::paginate(5); // Mengambil semua data dari model Course
        $header_title = "Daftar Kelas"; // Judul yang ingin ditampilkan

        // Mengembalikan view 'WMI/course/course' dengan data course dan header_title
        return view('WMI/Course/course', ['courses' => $courses, 'header_title' => $header_title]);
    }

    public function indexmentor()
    {
        // Mendapatkan peran (role) pengguna saat ini
        $currentUserRole = auth()->user()->role;

        // Menyusun query untuk mengambil kursus berdasarkan peran pengguna
        $coursesQuery = Course::join('users', function ($join) {
            $join->on('course.user_role', '=', 'users.role')
                ->where('users.id', auth()->user()->id);
        })->select('course.*');

      

        // Menyimpan hasil query dalam variabel $courses
        $courses = $coursesQuery->paginate(5);
        // dd($coursesQuery->toSql());
        // Menyusun judul header berdasarkan peran pengguna
        $header_title = ($currentUserRole === 'mentor') ? "Your Courses" : "Daftar Kelas";

        // Mengembalikan tampilan dengan data yang sesuai
        return view('Mentor/Course/coursementor', compact('courses', 'header_title'));
    }

    public function indexmentee()
    {
        // Mendapatkan peran (role) pengguna saat ini
        $currentUserRole = auth()->user()->role;

        // Menyusun query untuk mengambil kursus berdasarkan peran pengguna
        $coursesQuery = Course::join('users', function ($join) {
            $join->on('course.user_role', '=', 'users.role')
                ->where('users.id', auth()->user()->id);
        })->select('course.*');

        // Menyimpan hasil query dalam variabel $courses
        $courses = $coursesQuery->paginate(5);

        // Menyusun judul header berdasarkan peran pengguna
        $header_title = ($currentUserRole === 'mentor') ? "Your Courses" : "Daftar Kelas";

        // Mengembalikan tampilan dengan data yang sesuai
        return view('Mentee/Course/Coursementee', compact('courses', 'header_title'));
    }

    public function show()
    { // Mengambil semua data dari model Course

        // Mengembalikan view 'WMI/course/course' dengan data course
        return view('auth/login');
    }


    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $input['email'], 'password' => $input['password']])) {
            if (auth()->user()->is_admin == 0) {
                return redirect('/landingwmi')->with('success', "Berhasil login!");
            } elseif (auth()->user()->is_admin == 1) {
                return redirect('/landingmentor')->with('success', "Berhasil login!");
            } elseif (auth()->user()->is_admin == 2) {
                return redirect('/landingmentee')->with('success', "Berhasil login!");
            }
        } else {
            return redirect()->route('login')->withErrors(['password' => 'Email-Address atau Password salah ! ']);
        }
    }

    public function add()
    {
        $data['header_title'] = "Form Tambah Course";
        return view('WMI/Course/add', $data);
    }

    public function insert(Request $request)
    {
        $user = Auth::user();

        // Validasi data
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'durasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);
        $gambarNama = $request->file('gambar')->getClientOriginalName();
        // Simpan gambar ke folder public/img
        $gambarPath = $request->file('gambar')->move(public_path('img'), $gambarNama);

        // Ambil nama file gambar dengan ekstensinya
        $gambarNama = $request->file('gambar')->getClientOriginalName();

        $course = new Course;
        $course->name = trim($request->name);
        $course->durasi = trim($request->durasi);
        $course->deskripsi = trim($request->deskripsi);
        $course->status = 0;
        $course->created_by = $user->id;
        $course->gambar = $gambarNama; // Simpan nama file gambar ke dalam basis data

        $course->save();

        return redirect()->route('course')->with('success', "Course successfully created");
    }

    public function edit($id)
    {
        $header_title = "Form Ubah Course";
        // Mengambil data course berdasarkan id
        $course = Course::findOrFail($id);

        // Mengembalikan view edit.blade.php dengan data course yang dipilih
        return view('WMI.Course.edit', compact('header_title', 'course'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Gunakan gambar hanya jika pengguna memilih untuk mengubahnya
            'name' => 'required|string|max:255',
            'durasi' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
        ]);

        $course = Course::findOrFail($id);

        // Jika pengguna mengunggah gambar baru
        if ($request->hasFile('gambar')) {
            // Validasi dan simpan gambar baru
            $request->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Hapus gambar lama dari direktori
            if (file_exists(public_path('img/' . $course->gambar))) {
                unlink(public_path('img/' . $course->gambar));
            }

            // Simpan gambar baru ke dalam direktori
            $gambarNama = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('img'), $gambarNama);

            // Simpan nama gambar baru ke dalam model course
            $course->gambar = $gambarNama;
        }

        // Update data course
        $course->name = $request->input('name');
        $course->durasi = $request->input('durasi');
        $course->deskripsi = $request->input('deskripsi');

        // Simpan perubahan
        $course->save();

        return redirect()->route('course', ['id' => $id])->with('success', 'Data berhasil diperbarui!');
    }

    public function delete($id)
    {

        // Mulai transaksi database
        DB::beginTransaction();

        // Hapus semua materi terkait
        Materi::where('course_id', $id)->delete();

        // Hapus kursus
        Course::destroy($id);

        // Commit transaksi
        DB::commit();

        return redirect()->back()->with('success', 'data berhasil dihapus.');

    }
    public function linkPertemuanDetail($id)
    {
        $header_title = "Link Pertemuan";

        // Ambil data dari model Link berdasarkan course_id yang sama dengan Materi
        $dataLink = Link::where('course_id', $id)->whereExists(function ($query) use ($id) {
            $query->select('id')
                ->from('materi')
                ->whereColumn('course_id', 'link_pertemuan.course_id');
        })->get();

        // Ambil data dari model Materi
        $dataMateri = Materi::join('course', 'course.id', '=', 'materi.course_id')
            ->where('materi.course_id', $id)
            ->select('materi.*', 'course.name as course_name')
            ->get();


        return view('WMI.Course.coursedetail', compact('header_title', 'dataMateri', 'dataLink'));
    }

    public function tugasdetail($id)
    {
        $header_title = "Tugas";
        $userId = auth()->id();
        // Ambil data dari model Materi
        $datatugas = Tugas::join('course', 'course.id', '=', 'tugas.course_id')
            ->where('tugas.course_id', $id)
            ->select('tugas.*', 'course.name as course_name')
            ->get();

        // Ambil data dari model Link berdasarkan course_id yang sama dengan Materi
        $dataLink = Link::whereHas('materi', function ($query) use ($id) {
            $query->where('course_id', $id);
        })->get();

        $periksa = TugasMentee::where('tugas_file')->exists();


        $dataMateri = Materi::join('course', 'course.id', '=', 'materi.course_id')
            ->where('materi.course_id', $id)
            ->select('materi.*', 'course.name as course_name')
            ->get();

        // dd($datatugas);

        return view('WMI.Course.coursedetail', compact('header_title', 'dataMateri', 'datatugas', 'dataLink', 'periksa'));

    }

    public function coursedetail($id)
    {
        $header_title = "Course";

        // Ambil data dari model Materi
        $dataMateri = Materi::join('course', 'course.id', '=', 'materi.course_id')
            ->where('materi.course_id', $id)
            ->select('materi.*', 'course.name as course_name')
            ->get();

        // Ambil data dari model Link berdasarkan course_id yang sama dengan Materi
        $dataLink = Link::whereHas('materi', function ($query) use ($id) {
            $query->where('course_id', $id);
        })->get();


        return view('WMI.Course.coursedetail', compact('header_title', 'dataMateri', 'dataLink'));
    }

    public function editlink($id)
    {
        $link = Link::findOrFail($id); // Temukan data link berdasarkan ID
        return view('edit_link_pertemuan', compact('link'));
    }

    public function updatelink(Request $request, $id)
    {
        $request->validate([
            'judul_link' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            // Sesuaikan validasi sesuai kebutuhan
        ]);

        $link = Link::findOrFail($id); // Temukan data link berdasarkan ID
        $link->judul_link = $request->judul_link;
        $link->deskripsi = $request->deskripsi;
        // Perbarui atribut lainnya sesuai kebutuhan
        $link->save();

        return redirect()->back()->with('success', 'Link berhasil diperbarui.');

    }






    public function storelink(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul_link' => 'required',
            'deskripsi' => 'required',
            'course_id' => 'required|exists:link_pertemuan,course_id', // Pastikan course_id yang diberikan benar-benar ada di tabel courses
        ]);



        // Buat objek LinkPertemuan baru
        $linkPertemuan = new Link();

        // Isi properti dari objek dengan data dari request
        $linkPertemuan->judul_link = $request->judul_link;
        $linkPertemuan->deskripsi = $request->deskripsi;
        $linkPertemuan->course_id = $request->course_id; // Set course_id dari request

        // Simpan objek ke database
        $linkPertemuan->save();

        // Redirect ke halaman sebelumnya
        return redirect()->back()->with('success', 'Link pertemuan berhasil ditambahkan.');

    }


    public function updatedetaill(Request $request, $id)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'judul_materi' => 'required|string|max:255',
            'deskripsi_materi' => 'required|string',
            'file_materi' => 'nullable|mimes:pdf|max:2048',
        ]);

        // Cari materi berdasarkan ID
        $materi = Materi::findOrFail($id);

        // Perbarui data materi
        $materi->judul_materi = $request->judul_materi;
        $materi->deskripsi_materi = $request->deskripsi_materi;

        // Jika file materi baru diunggah, simpan file yang baru
        if ($request->hasFile('file_materi')) {
            $fileMateriNama = $request->file('file_materi')->getClientOriginalName();
            $fileMateriPath = $request->file('file_materi')->move(public_path('filemateri'), $fileMateriNama);
            $materi->file_materi = $fileMateriNama;
        }

        // Simpan perubahan
        $materi->save();

        return redirect()->back()->with('success', 'Materi berhasil diperbarui.');
    }

    public function updatetugas(Request $request, $id)
    {
        // dd($request);    
        // Validasi input jika diperlukan
        $request->validate([
            'judul_tugas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file_tugas' => 'nullable|mimes:pdf|max:2048',
        ]);

        // Cari materi berdasarkan ID
        $tugas = Tugas::findOrFail($id);

        // Perbarui data tugas
        $tugas->judul_tugas = $request->judul_tugas;
        $tugas->deskripsi = $request->deskripsi;

        // Jika file tugas baru diunggah, simpan file yang baru
        if ($request->hasFile('file_tugas')) {
            $filetugasnama = $request->file('file_tugas')->getClientOriginalName();
            $filetugasPath = $request->file('file_tugas')->move(public_path('filetugas'), $filetugasnama);
            $tugas->file_tugas = $filetugasnama;
        }

        // Simpan perubahan
        $tugas->save();

        return redirect()->back()->with('success', 'Tugas berhasil diperbarui.');
    }

    public function storetugas(Request $request, $id)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'file_tugas' => 'required|mimes:pdf|max:2048', // Contoh validasi untuk file PDF, sesuaikan dengan kebutuhan Anda
            'judul_tugas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        // Simpan file materi ke dalam folder public/filemateri
        $filtugasnama = $request->file('file_tugas')->getClientOriginalName();
        $fileMateriPath = $request->file('file_tugas')->move(public_path('filetugas'), $filtugasnama);

        // Simpan data materi ke dalam database
        Tugas::create([
            'judul_tugas' => $request->judul_tugas,
            'deskripsi' => $request->deskripsi,
            'file_tugas' => $filtugasnama, // Simpan nama file materi ke dalam basis data
            'course_id' => $id, // Menggunakan $id dari parameter rute
        ]);

        return redirect()->route('courses.detail', ['id' => $id])->with('success', "Materi successfully added.");
    }



    public function storedetail(Request $request, $id)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'file_materi' => 'required|mimes:pdf|max:2048', // Contoh validasi untuk file PDF, sesuaikan dengan kebutuhan Anda
            'judul_materi' => 'required|string|max:255',
            'deskripsi_materi' => 'required|string',
        ]);

        // Simpan file materi ke dalam folder public/filemateri
        $fileMateriNama = $request->file('file_materi')->getClientOriginalName();
        $fileMateriPath = $request->file('file_materi')->move(public_path('filemateri'), $fileMateriNama);

        // Simpan data materi ke dalam database
        Materi::create([
            'judul_materi' => $request->judul_materi,
            'deskripsi_materi' => $request->deskripsi_materi,
            'file_materi' => $fileMateriNama, // Simpan nama file materi ke dalam basis data
            'course_id' => $id, // Menggunakan $id dari parameter rute
        ]);

        return redirect()->route('courses.detail', ['id' => $id])->with('success', "Materi successfully added.");
    }


    public function deletedetail($id)
    {

        $materi = Materi::findOrFail($id);
        // Hapus file materi dari folder
        $file_path = public_path('filemateri/' . $materi->file_materi);
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        // Hapus materi dari basis data
        $materi->delete();
        return redirect()->back()->with('success', "Materi successfully deleted.");
    }

    public function deletetugas($id)
    {

        $tugas = Tugas::findOrFail($id);
        // Hapus file tugas dari folder
        $file_path = public_path('filetugas/' . $tugas->file_tugas);
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        // Hapus materi dari basis data
        $tugas->delete();
        return redirect()->back()->with('success', "Tugas successfully deleted.");
    }


    public function deletelink($id)
    {

        $link = Link::findOrFail($id);
        // Hapus file materi dari folder

        // Hapus materi dari basis data
        $link->delete();
        return redirect()->back()->with('success', "Link successfully deleted.");
    }

    public function showw($id)
    {
        $course = Course::findOrFail($id);
        return view('WMI.Course.detail', ['course' => $course]);
    }

    public function updatedetail(Request $request, $id)
    {
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'edit_judul_materi' => 'required',
            'edit_deskripsi_materi' => 'required',
            'edit_file_materi' => 'file|mimes:pdf,doc,docx', // Sesuaikan dengan ekstensi yang diinginkan
        ]);

        // Ambil data materi berdasarkan ID
        $materi = Materi::findOrFail($id);

        // Update judul dan deskripsi materi
        $materi->judul_materi = $validatedData['edit_judul_materi'];
        $materi->deskripsi_materi = $validatedData['edit_deskripsi_materi'];

        // Periksa apakah ada file materi yang diunggah
        if ($request->hasFile('edit_file_materi')) {
            // Ambil file materi dari request
            $file = $request->file('edit_file_materi');

            // Simpan file materi ke dalam storage
            $file_path = $file->store('filemateri');

            // Simpan nama file materi ke dalam basis data
            $materi->file_materi = $file_path;
        }

        // Simpan perubahan
        $saved = $materi->save();

        if ($saved) {
            // Jika data berhasil disimpan
            \Log::info('Data materi berhasil diperbarui.');
        } else {
            // Jika terjadi kesalahan saat menyimpan data
            \Log::error('Gagal menyimpan data materi.');
        }

        // Redirect ke halaman detail kursus setelah menyimpan data
        return redirect()->back()->with('success', 'Data materi berhasil diperbarui.');
    }


    // public function deletemateri($id)
    // {
    //     $materi = Materi::findOrFail($id);
    //     $materi->deletemateri();
    //     return redirect()->route('coursedetail')->with('success', 'Pengumuman berhasil dihapus.');
    // }

}
