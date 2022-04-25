<?php

namespace App\Http\Controllers;

use App\Models\denahsatuldua;
use Illuminate\Http\Request;
use App\Models\denah;

class denahsatulantaiduacon extends Controller
{
    public function tabeldenahsatulantaidua()
    {
        $datadenahsatuldua=denahsatuldua::all();
        return view('admin.tabeldenahsatulantaidua')->with([
            'datadenahsatuldua' => $datadenahsatuldua
        ]);
    }

    public function createkantinsatulantaidua()
    {
        return view ('admin.createkantinsatulantaidua');
    }

    public function storee (Request $request)
        {
            $info = new denah();
            $info->nama = $request->nama;
            $info->namadua = $request->namadua;
            $info->prodi = $request->prodi;
            $info->prodidua = $request->prodidua;
            $info->meja = $request->meja;
            $info -> save();
            return redirect('tabeldenah');
        }

    public function store(Request $request)
    {
        $info = new denahsatuldua();
        $info->nama = $request->nama;
        $info->namadua = $request->namadua;
        $info->prodi = $request->prodi;
        $info->prodidua = $request->prodidua;
        $info->meja = $request->meja;
        $info -> save();
        return redirect('tabeldenahsatulantaidua');
    }

    public function delete($id)
    {
        $deletedenah = denahsatuldua::find($id);
         if($deletedenah->delete()){}
           return redirect()->back();
    }

    public function edit($id)
    {
        $update = denahsatuldua::find($id);
        return view('admin.editkantinsatulantaidua',compact('update'));
    }

    public function update(request $request, $id){
        $update = denahsatuldua::find($id); 
        $update->nama= $request->nama;
        $update->namadua= $request->namadua;
        $update->prodi = $request->prodi;
        $update->prodidua = $request->prodidua;
        $update->meja = $request->meja;
        $update -> save();
           
            return redirect('/tabeldenahsatulantaidua');         
    
        }

}

