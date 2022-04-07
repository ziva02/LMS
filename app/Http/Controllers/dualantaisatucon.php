<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dualantaisatu;

class dualantaisatucon extends Controller
{
    public function tabeldenahdualantaisatu()
    {
        $datadenahdualsatu=dualantaisatu::all();
        return view('admin.tabeldenahdualantaisatu')->with([
            'datadenahdualsatu' => $datadenahdualsatu
        ]);
    }

    public function createkantindualantaisatu()
    {
        return view ('admin.createkantindualantaisatu');
    }

    public function store(Request $request)
    {
        $info = new dualantaisatu();
        $info->nama = $request->nama;
        $info->prodi = $request->prodi;
        $info -> save();
        return redirect('tabeldenahdualantaisatu');
    }

    public function delete($id)
    {
        $deletedenah = dualantaisatu::find($id);
         if($deletedenah->delete()){}
           return redirect()->back();
    }
    public function edit($id)
    {
        $update = dualantaisatu::find($id);
        return view('admin.editkantindualantaisatu',compact('update'));
    }

    public function update(request $request, $id){
        $update = dualantaisatu::find($id); 
            $update->nama= $request->nama;
            $update->prodi = $request->prodi;
            $update -> save();
           
            return redirect('/tabeldenahdualantaisatu');         
    
        }
}
