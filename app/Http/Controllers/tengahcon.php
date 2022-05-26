<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tengah;

class tengahcon extends Controller
{
    public function tabeltengah()
    {
        $datatengah=tengah::all();
        return view('admin.tabeltengah')->with([
            'datatengah' => $datatengah
        ]);
    }

    public function createkantintengah()
    {
        return view ('admin.createkantintengah');
    }

    public function store(Request $request)
    {
        $info = new tengah();
        $info->nama = $request->nama;
        $info->namadua = $request->namadua;
        $info->prodi = $request->prodi;
        $info->prodidua = $request->prodidua;
        $info->meja = $request->meja;;
        $info -> save();
        return redirect('tabeltengah');
    }

    public function delete($id)
    {
        $deletedenah = tengah::find($id);
         if($deletedenah->delete()){}
           return redirect()->back();
    }
    public function kantintengah()
    {
        $datadenah=tengah::all();
        return view('kantintengah',compact('datadenah'));
    }

    public function edit($id)
    {
        $update = tengah::find($id);
        return view('admin.editkantintengah',compact('update'));
    }

    public function update(request $request, $id){
            $update = tengah::find($id); 
            $update->nama= $request->nama;
            $update->namadua= $request->namadua;
            $update->prodi = $request->prodi;
            $update->prodidua = $request->prodidua;
            $update->meja = $request->meja;
            $update -> save();
           
            return redirect('/tabeltengah');         
    
        }

}
