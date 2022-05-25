<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Izin;

class izincontroller extends Controller
{
    public function tabelizin()
    {
        $izin=izin::all();
        return view('admin.tabelizin')->with([
            'izin' => $izin
        ]);
    }

    public function delete($id)
    {
        $deleteinfo = izin::find($id);
         if($deleteinfo->delete()){}
           return redirect()->back();
    }
    public function store(Request $request)
    {
        $info = new izin();
        $info->nama = $request->nama;
        $info->nim = $request->nim;
        $info->prodi = $request->prodi;
        $info->subjek = $request->subjek;
        $info->keterangan = $request->keterangan;
        $info -> save();
        return redirect('portfolio');
    }
}
