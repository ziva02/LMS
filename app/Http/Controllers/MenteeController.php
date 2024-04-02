<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mentee;
use Hash;


class MenteeController extends Controller
{
    //
    public function index()
    {
        $header_title = "Data Mentee";
        $mentee = Mentee::where('is_admin', 2)->paginate(2);

        // Mengembalikan view 'WMI/mentor/datamentor' dengan data dashboards
        return view('WMI/Mentee.datamentee', compact('header_title', 'mentee'));
    }

    public function add()
    {
        $data['header_title']="Form Tambah Data Mentee";
        return view ('WMI.Mentee.add', $data);
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
        $user->password = Hash::make($request->password);
        $user->is_admin = 2;

        $user->save();

        return redirect()->route('datamentee')->with('success', "WMI successfully created");
    }

    public function edit($id)
    {
        $header_title = "Form Ubah Data Mentee";
        $mentee = Mentee::findOrFail($id);
        return view('WMI/Mentee/edit', compact('header_title','mentee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_mentee' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8',
        ]);

        $mentee = Mentee::findOrFail($id);
        $mentee->id_mentee = $request->input('id_mentee');
        $mentee->name = $request->input('name');
        $mentee->role = $request->input('role');
        $mentee->email = $request->input('email');

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
}
