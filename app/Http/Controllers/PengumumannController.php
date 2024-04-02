<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;

class PengumumannController extends Controller
{
    //

    public function index()
    {
        $header_title = "Pengumuman";
        $pengumumans = Pengumuman::latest('created_at')->paginate(2);

        // Kemudian, bisa melakukan apapun yang diinginkan dengan data pengumuman tersebut,
        // misalnya melewatkan ke view untuk ditampilkan
        return view('WMI.pengumumann.pengumuman', compact('header_title', 'pengumumans'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        // Buat objek pengumuman baru
        $pengumuman = new Pengumuman();
        $pengumuman->judul = $request->judul;
        $pengumuman->deskripsi = $request->deskripsi;

        // Simpan data ke dalam tabel pengumuman
        $pengumuman->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('pengumuman')->with('success', 'Pengumuman berhasil ditambahkan.');

    }
    public function edit($id)
    {
        // Temukan pengumuman berdasarkan ID
        $pengumuman = Pengumuman::findOrFail($id);

        // Kembalikan view edit dengan data pengumuman yang ditemukan
        return view('WMI.pengumumann.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        // Temukan pengumuman berdasarkan ID
        $pengumuman = Pengumuman::findOrFail($id);

        // Update data pengumuman
        $pengumuman->judul = $request->judul;
        $pengumuman->deskripsi = $request->deskripsi;
        $pengumuman->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('pengumuman')->with('success', 'Pengumuman berhasil diperbarui.');
    }
    public function delete($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();
        return redirect()->route('pengumuman')->with('success', 'Pengumuman berhasil dihapus.');
    }

}
