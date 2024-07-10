<?php

namespace App\Http\Controllers;

use App\Exports\NilaiExport;
use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\User;
use Hash;
use App\Models\TugasMentee;
use App\Models\Tugas;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header_title = "Data Mentor";
        $mentor = Mentor::where('is_admin', 1)->paginate(20);

        // Mengembalikan view 'WMI/Mentor/datamentor' dengan data dashboards
        return view('WMI/Mentor.datamentor', compact('header_title', 'mentor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $data['header_title'] = "Form Tambah Data Mentor";
        return view('WMI.Mentor.add', $data);
    }

    public function insert(Request $request)
    {
        // dd($request->all());

        // request()->validate([
        //     'email' => 'required|email|unique:users'
        // ]);

        $user = new User;
        $user->id_mentor = trim($request->id_mentor);
        $user->name = trim($request->name);
        $user->role = trim($request->role);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->is_admin = 1;

        $user->save();

        return redirect()->route('datamentor')->with('success', "WMI successfully created");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $header_title = "Form Ubah Data Mentor";
        $mentor = Mentor::findOrFail($id);
        return view('WMI/Mentor/edit', compact('header_title', 'mentor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_mentor' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $mentor = Mentor::findOrFail($id);
        $mentor->id_mentor = $request->input('id_mentor');
        $mentor->name = $request->input('name');
        $mentor->role = $request->input('role');
        $mentor->email = $request->input('email');

        // Check if password field is filled
        if ($request->has('password')) {
            $mentor->password = bcrypt($request->input('password'));
        }

        $mentor->save();

        return redirect()->route('datamentor', ['id' => $id])->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $mentor = User::findOrFail($id); // Mencari data mentor berdasarkan ID
        $mentor->delete(); // Menghapus data mentor

        return redirect()->route('datamentor')->with('success', 'Data mentor berhasil dihapus'); // Redirect kembali ke halaman data mentor dengan pesan sukses
    }

    public function datamentee()
    {
        $mentee = DB::table('users')
            ->join('course', 'users.role', '=', 'course.user_role')
            ->where('users.is_admin', 2)
            ->paginate(5);

        return view('WMI.Mentor.datamentee', ['mentee' => $mentee]); // Mengembalikan tampilan dengan data mentee
    }



    public function lihatPengumpulan($tugas_id)
    {
        // Ambil data tugas_mentee yang memiliki tugas_id yang sesuai
        $tugasMentees = TugasMentee::where('tugas_id', $tugas_id)->get();
        // dd($tugasMentees);
        $judulTugas = Tugas::where('id', $tugas_id)->value('judul_tugas');

        $ceknilai = TugasMentee::where('tugas_id', $tugas_id)
            ->where(function ($query) {
                $query->whereNull('nilai')
                    ->orWhere('nilai', '');
            })
            ->get();
        // dd($ceknilai);
        $data = DB::table('users')
            ->join('course', 'users.role', '=', 'course.user_role')
            ->where('users.is_admin', 2)
            ->whereNotIn('users.id', function ($query) {
                $query->select('user_id')
                    ->from('tugas_mentee');
            })
            ->select('users.name')
            ->get();




        // Kirim data ke view untuk ditampilkan

        return view('WMI.Mentor.tugas', [
            'tugasMentees' => $tugasMentees,
            'data' => $data,
            'ceknilai' => $ceknilai,
            'judulTugas' => $judulTugas
        ]);


    }

    public function AverageNilai()
    {
        return Excel::download(new NilaiExport, 'Rata Rata Mentee.xlsx');
    }

    public function tidakkumpul($tugas_id)
    {
        // Ambil data tugas_mentee yang memiliki tugas_id yang sesuai
        $tugasMentees = TugasMentee::where('tugas_id', $tugas_id)->get();

        // Kirim data ke view untuk ditampilkan
        return view('WMI.Mentor.tugas', ['tugasMentees' => $tugasMentees]);


    }

    public function isiNilai(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nilai' => 'required|numeric|min:0|max:100', // Sesuaikan dengan kebutuhan Anda
        ]);

        // Temukan tugas_mentee berdasarkan id
        $tugasMentee = TugasMentee::findOrFail($id);

        // Isi field nilai dengan nilai yang diterima dari request
        $tugasMentee->update([
            'nilai' => $request->nilai,
        ]);

        // Redirect kembali ke halaman sebelumnya atau halaman lain yang diinginkan
        return redirect()->back();
    }



}
