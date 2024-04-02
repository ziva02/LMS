<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;

class BerandaController extends Controller
{
    //
    public function beranda()
    {
        $header_title = "Beranda LMS";
        $pengumumans = Pengumuman::latest()->take(3)->get();
        return view('WMI.beranda', compact('header_title','pengumumans'));
    }
    
}
