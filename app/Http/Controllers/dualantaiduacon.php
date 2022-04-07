<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dualantaidua;

class dualantaiduacon extends Controller
{
    public function tabeldenahdualantaidua()
    {
        $datadenahdualdua=dualantaidua::all();
        return view('admin.tabeldenahdualantaidua')->with([
            'datadenahdualdua' => $datadenahdualdua
        ]);
    }

    public function createkantindualantaidua()
    {
        return view ('admin.createkantindualantaidua');
    }

    public function store(Request $request)
    {
        $info = new dualantaidua();
        $info->nama = $request->nama;
        $info->prodi = $request->prodi;
        $info -> save();
        return redirect('tabeldenahdualantaidua');
    }

    public function delete($id)
    {
        $deletedenah = dualantaidua::find($id);
         if($deletedenah->delete()){}
           return redirect()->back();
    }
    public function edit($id)
    {
        $update = dualantaidua::find($id);
        return view('admin.editkantindualantaidua',compact('update'));
    }

    public function update(request $request, $id){
        $update = dualantaidua::find($id); 
            $update->nama= $request->nama;
            $update->prodi = $request->prodi;
            $update -> save();
           
            return redirect('/tabeldenahdualantaidua');         
    
        }
}
