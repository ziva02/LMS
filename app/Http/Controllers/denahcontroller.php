<?php

namespace App\Http\Controllers;

use App\Models\denah;

use Illuminate\Http\Request;

class denahcontroller extends Controller
{
    public function tabeldenah()
    {
        $datadenah=denah::all();
        return view('admin.tabeldenah')->with([
            'datadenah' => $datadenah
        ]);
    }

    public function createkantinsatu()
    {
        return view ('admin.createkantinsatu');
    }



    public function store(Request $request)
    {
        $info = new denah();
        $info->nama = $request->nama;
        $info->prodi = $request->prodi;
        $info -> save();
        return redirect('tabeldenah');
    }

    public function delete($id)
    {
        $deletedenah = denah::find($id);
         if($deletedenah->delete()){}
           return redirect()->back();
    }

    public function edit($id)
    {
        $update = denah::find($id);
        return view('admin.editkantinsatu',compact('update'));
    }

    public function update(request $request, $id){
        $update = denah::find($id); 
            $update->nama= $request->nama;
            $update->prodi = $request->prodi;
            $update -> save();
           
            return redirect('/tabeldenah');         
    
        }

        public function editkantinsatu()
    {
        return view ('admin.editkantinsatu');
    }
}
