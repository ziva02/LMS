<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, $id)
    {
        // Validasi data yang dikirimkan oleh pengguna
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah menjadi nullable
            'password' => 'nullable|string|min:8', // password bisa kosong
        ]);

        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Update data profil pengguna
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        // Ambil profil berdasarkan ID
        $profil = User::findOrFail($id);

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('foto')) {
            // Validasi dan simpan gambar baru
            $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Hapus foto lama dari direktori
            if (file_exists(public_path('profil/' . $profil->foto))) {
                unlink(public_path('profil/' . $profil->foto));
            }

            // Simpan gambar baru ke dalam direktori
            $gambarNama = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('profil'), $gambarNama);

            // Simpan nama gambar baru ke dalam model profil
            $profil->foto = $gambarNama;
        }

        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }

        // Simpan perubahan pada profil pengguna
        $user->save();

        // Simpan perubahan pada model profil
        $profil->save();

        // Redirect kembali ke halaman edit profil dengan pesan sukses
        return redirect()->route('beranda')->with('success', 'Profil berhasil diperbarui!');
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editProfile()
    {
        $user = Auth::user();

        // Tampilkan halaman edit profil dengan data pengguna yang sedang login
        return view('auth.edit', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
