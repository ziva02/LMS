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
        $jadwall=kantinsatusatu::all();
         $uang=kantinsatusatu::all();
         $tengah=kantinsatusatu::all();
         $satudua= kantinsatusatu::all();
         $duadua= kantinsatusatu::all();
        return view('jadwalpiket')->with([
            'jadwall' => $jadwall,
            'uang' => $uang,
            'tengah' => $tengah,
            'satudua' => $satudua,
            'duadua' => $duadua

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
        public function tabeljadwalkantinsatudua()
        {
            $jadwal=kantinsatusatu::all();
            return view('admin.tabeljadwalkantinsatudua')->with([
                'jadwal' => $jadwal
            ]);
        }

        public function editsatudua($id)
        {
            $update = kantinsatusatu::find($id);
            return view('admin.editjadwalsatudua',compact('update'));
        }
    
        public function updatesatudua(request $request, $id){
                $update = kantinsatusatu::find($id); 
                $update->hari= $request->hari;
                $update->piketsatudua= $request->piketsatudua;
                $update -> save();
               
                return redirect('/tabeljadwalkantinsatudua');         
        
            }


            
        public function tabeljadwalkantintengah()
        {
            $jadwal=kantinsatusatu::all();
            return view('admin.tabeljadwalkantintengah')->with([
                'jadwal' => $jadwal
            ]);
        }

        public function edittengah($id)
        {
            $update = kantinsatusatu::find($id);
            return view('admin.editjadwaltengah',compact('update'));
        }
    
        public function updatetengah(request $request, $id){
                $update = kantinsatusatu::find($id); 
                $update->hari= $request->hari;
                $update->pikettengah= $request->pikettengah;
                $update -> save();
               
                return redirect('/tabeljadwalkantintengah');         
        
            }


            public function tabeljadwalkantinduasatu()
        {
            $jadwal=kantinsatusatu::all();
            return view('admin.tabeljadwalkantinduasatu')->with([
                'jadwal' => $jadwal
            ]);
        }

        public function editduasatu($id)
        {
            $update = kantinsatusatu::find($id);
            return view('admin.editjadwalduasatu',compact('update'));
        }
    
        public function updateduasatu(request $request, $id){
                $update = kantinsatusatu::find($id); 
                $update->hari= $request->hari;
                $update->piketduasatu= $request->piketduasatu;
                $update -> save();
               
                return redirect('/tabeljadwalkantinduasatu');         
        
            }

            public function tabeljadwalkantinduadua()
            {
                $jadwal=kantinsatusatu::all();
                return view('admin.tabeljadwalkantinduadua')->with([
                    'jadwal' => $jadwal
                ]);
            }
    
            public function editduadua($id)
            {
                $update = kantinsatusatu::find($id);
                return view('admin.editjadwalduadua',compact('update'));
            }
        
            public function updateduadua(request $request, $id){
                    $update = kantinsatusatu::find($id); 
                    $update->hari= $request->hari;
                    $update->piketduadua= $request->piketduadua;
                    $update -> save();
                   
                    return redirect('/tabeljadwalkantinduadua');         
            
                }
}
