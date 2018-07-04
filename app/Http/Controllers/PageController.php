<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function jabatan()
    {
        return view('pages.datamaster.jabatan');
    }

    public function pegawai()
    {
        return view('pages.proses.pegawai');
    }
}
