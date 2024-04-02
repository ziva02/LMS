<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\User;
use Hash;

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
        $mentor = Mentor::where('is_admin', 1)->paginate(2);

        // Mengembalikan view 'WMI/mentor/datamentor' dengan data dashboards
        return view('WMI/mentor.datamentor', compact('header_title', 'mentor'));
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
}
