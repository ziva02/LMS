<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Mentee;
use App\Models\TugasMentee;
use App\Models\Tugas;
use Hash;



class MenteeController extends Controller
{
    //
    public function index()
    {
        $header_title = "Data Mentee";
        $mentee = Mentee::where('is_admin', 2)->paginate(20);

        // Mengembalikan view 'WMI/mentor/datamentor' dengan data dashboards
        return view('WMI/Mentee.datamentee', compact('header_title', 'mentee'));
    }

    public function add()
    {
        $data['header_title'] = "Form Tambah Data Mentee";
        return view('WMI.Mentee.add', $data);
    }

    public function insert(Request $request)
    {
        // dd($request->all());

        // request()->validate([
        //     'email' => 'required|email|unique:users'
        // ]);

        $user = new User;
        $user->id_mentee = trim($request->id_mentee);
        $user->name = trim($request->name);
        $user->role = trim($request->role);
        $user->email = trim($request->email);
        $user->email_supervisior = trim($request->email_supervisior);
        $user->password = Hash::make($request->password);
        $user->is_admin = 2;

        $user->save();

        return redirect()->route('datamentee')->with('success', "WMI successfully created");
    }

    public function edit($id)
    {
        $header_title = "Form Ubah Data Mentee";
        $mentee = Mentee::findOrFail($id);
        return view('WMI/Mentee/edit', compact('header_title', 'mentee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_mentee' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'email_supervisior' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $mentee = Mentee::findOrFail($id);
        $mentee->id_mentee = $request->input('id_mentee');
        $mentee->name = $request->input('name');
        $mentee->role = $request->input('role');
        $mentee->email = $request->input('email');
        $mentee->email_supervisior = $request->input('email_supervisior');

        // Check if password field is filled
        if ($request->has('password')) {
            $mentee->password = bcrypt($request->input('password'));
        }

        $mentee->save();

        return redirect()->route('datamentee', ['id' => $id])->with('success', 'Data berhasil diperbarui!');
    }

    public function delete($id)
    {
        $mentee = User::findOrFail($id); // Mencari data mentor berdasarkan ID
        $mentee->delete(); // Menghapus data mentor

        return redirect()->route('datamentee')->with('success', 'Data mentor berhasil dihapus'); // Redirect kembali ke halaman data mentor dengan pesan sukses
    }

    public function kumpul(Request $request, $id)
    {
        $user = Auth::user();
        $tugas_id = $request->id;

        // Cek apakah pengguna sudah mengumpulkan tugas ini sebelumnya
        $existingSubmission = TugasMentee::where('tugas_id', $tugas_id)
            ->where('user_id', $user->id)
            ->first();

        if ($existingSubmission) {
            // Jika sudah ada submisi, kembalikan dengan pesan error
            return back()->with('error', 'Anda sudah pernah mengumpulkan tugas ini.');
        }

        // Validasi file yang diunggah
        $request->validate([
            'tugas_file' => 'required|mimes:pdf|max:2048', // Contoh validasi untuk file PDF
        ]);

        // Simpan file yang diunggah ke direktori public/tugas_mentee
        $filtugasnama = $request->file('tugas_file')->getClientOriginalName();
        $fileMateriPath = $request->file('tugas_file')->move(public_path('tugas_mentee'), $filtugasnama);

        // Menemukan tugas menggunakan id yang diberikan
        $tugas = Tugas::findOrFail($tugas_id);
        $course_id = $tugas->course_id;

        // Menyimpan data submisi tugas ke dalam database
        TugasMentee::create([
            'tugas_id' => $tugas_id,
            'user_id' => $user->id,
            'tugas_file' => $filtugasnama, // Menyimpan nama file ke dalam basis data
            'course_id' => $course_id,
        ]);

        return back()->with('success', 'Tugas berhasil dikumpulkan.');
    }



    public function showSubmitTugasPage()
    {
        // Mendapatkan id user yang sedang login
        $userId = Auth::id();

        // Memeriksa apakah user telah mengirimkan tugas
        $hasSubmittedTask = TugasMentee::where('user_id', $userId)->exists();

        return view('WMI.Course.coursedetail', ['hasSubmittedTask' => $hasSubmittedTask]);
    }



}

