<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class produkcontroller extends Controller
{
    public function tabelproduk()
    {
        $produk=produk::all();
        return view('admin.tabelproduk')->with([
            'produk' => $produk
        ]);
    }

    public function createproduk()
    {
        return view ('admin.createproduk');
    }

    public function store(Request $request)
    {
        $info = new produk();
        $info->nama = $request->nama;
        $info->harga = $request->harga;
        $info -> save();
        return redirect('tabelproduk');
    }

    public function delete($id)
    {
        $deletedenah = produk::find($id);
         if($deletedenah->delete()){}
           return redirect()->back();
    }
    public function edit($id)
    {
        $update = produk::find($id);
        return view('admin.editproduk',compact('update'));
    }

    public function update(request $request, $id){
            $update = produk::find($id); 
            $update->nama= $request->nama;
            $update->harga= $request->harga;
            $update -> save();
           
            return redirect('/tabelproduk');         
    
        }
}
