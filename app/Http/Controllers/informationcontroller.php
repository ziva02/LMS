<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\information;

class informationcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tabel()
    {
        $datainformation=information::all();
        return view('admin.tabel')->with([
            'datainformation' => $datainformation
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createinformation()
    {
        return view ('admin.createinformation');
    }

    public function edittabel()
    {
        return view ('admin.edittabel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $info = new information();
        $info->Judul = $request->Judul;
        $info->Deskripsi = $request->Deskripsi;
        $info->Tanggal = $request->Tanggal;
        if ($request->hasFile('Gambar')){
            $file= $request->file('Gambar')->getClientOriginalName();
            $request->file('Gambar')->move('images/Informationimages',$file);
            $info->Gambar = $file;
        } 
        $info -> save();
        return redirect('tabel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update = information::find($id);
        return view('admin.edittabel',compact('update'));
    }

    public function about()
    {
        $info=information::all();
        return view('about',compact('info'));
        $info['orderby']=="Tanggal" && $info['order']=="desc";
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id){
        $update = information::find($id);
            $file = $update->Gambar;
            if ($request->hasFile('Gambar')){
                $file= $request->file('Gambar')->getClientOriginalName();
                $request->file('Gambar')->move('images/Informationimages',$file);
                $update->Gambar = $file;
            }   
            $update->Judul= $request->Judul;
            $update->Gambar = $file;
            $update->Deskripsi = $request->Deskripsi;
            $update->Tanggal = $request->Tanggal;
            $update -> save();
           
            return redirect('/tabel');         
    
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $deleteinfo = information::find($id);
         if($deleteinfo->delete()){}
           return redirect()->back();
    }
}
