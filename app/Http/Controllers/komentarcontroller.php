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
}
