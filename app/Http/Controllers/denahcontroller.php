<?php

namespace App\Http\Controllers;

use App\Models\denah;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class denahcontroller extends Controller
{
    public function tabeldenah()
    {
        $datadenah=DB::table('denah')->get();
        return view('admin.tabeldenah',['datadenah' => $datadenah]);
    }

    public function createkantinsatu()
    {
        return view ('admin.createkantinsatu');
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
