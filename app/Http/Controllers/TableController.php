<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Model
use App\Model\Jabatan;
use App\Model\Pegawai;
//package
use Yajra\DataTables\Facades\DataTables;

class TableController extends Controller
{
    public function tableJabatan()
    {
        $jabatan = Jabatan::OrderBy('created_at', 'DSC')->get();
        return Datatables::of($jabatan)
            ->addColumn('action', function ($jabatan) {
                return '<div class="btn-toolbar">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-default btn-xs" data-toggle="dropdown">
                                    <i class="fa fa-cog"> &nbsp; <i class="fa fa-caret-down"></i></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a onclick="editJabatan(' . $jabatan->id . ')" class="btn-edit"><i class="fa fa-pencil " id="edit"></i> Edit </a></li>
                                        <li><a onclick="deleteData(' . $jabatan->id . ')" class="btn-delete"><i class="fa fa-trash-o delete-tag"></i> Hapus </a></li>
                                    </ul>
                                </div>
                            </div>
                            ';
            })->rawColumns(['action'])->make(true);
    }

    public function tablePegawai()
    {
        $pegawai = Pegawai::with('Jabatan')->get();
        
        return Datatables::of($pegawai)
        ->addColumn('gender', function ($pegawai){
            if ($pegawai->jenis_kelamin == 0) {
                return 'Laki-laki';
            } else {
                return 'Perempuan';
            }
        })
        ->addColumn('action', function ($pegawai){
            return '<div class="btn-toolbar">
                        <div class="btn-group">
                            <a href="#" class="btn btn-default btn-xs" data-toggle="dropdown">
                            <i class="fa fa-cog"> &nbsp; <i class="fa fa-caret-down"></i></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a onclick="editPegawai(' . $pegawai->id . ')" class="btn-edit"><i class="fa fa-pencil " id="edit"></i> Edit </a></li>
                                <li><a onclick="deleteData(' . $pegawai->id . ')" class="btn-delete"><i class="fa fa-trash-o delete-tag"></i> Hapus </a></li>
                            </ul>
                        </div>
                    </div>
                    ';
        })->rawColumns(['gender','action'])->make(true);
    }
}
