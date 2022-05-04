<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\komentar;

class komentarcontroller extends Controller
{
    public function tabelkomentar()
    {
        $komentar=komentar::all();
        return view('admin.tabelkomentar')->with([
            'komentar' => $komentar
        ]);
    }

    public function blog()
    {
        $datakomentar=komentar::all();
        return view('blog',compact('datakomentar'));
    }

    public function store(Request $request)
    {
        $info = new komentar();
        $info->nama = $request->nama;
        $info->nim = $request->nim;
        $info->subjek = $request->subjek;
        $info->Komentar = $request->Komentar;
        $info -> save();
        return redirect('blog');
    }
}
