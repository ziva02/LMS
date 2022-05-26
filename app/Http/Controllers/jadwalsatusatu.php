<?php

namespace App\Http\Controllers;
use App\Models\kantinsatusatu;

use Illuminate\Http\Request;

class jadwalsatusatu extends Controller
{
    public function tabeljadwalkantinsatusatu()
    {
        $jadwal=kantinsatusatu::all();
        return view('admin.tabeljadwalkantinsatusatu')->with([
            'jadwal' => $jadwal
        ]);
    }

    public function jadwalpiket()
    {
        $jadwal=kantinsatusatu::all();
        return view('jadwalpiket')->with([
            'jadwal' => $jadwal
        ]);
    }

    public function edit($id)
    {
        $update = kantinsatusatu::find($id);
        return view('admin.editjadwalsatusatu',compact('update'));
    }

    public function update(request $request, $id){
            $update = kantinsatusatu::find($id); 
            $update->hari= $request->hari;
            $update->piket= $request->piket;
            $update -> save();
           
            return redirect('/tabeljadwalkantinsatusatu');         
    
        }
}
