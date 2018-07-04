<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Jabatan;
use App\Model\Pegawai;
class FormController extends Controller
{
    public function addJabatan(Request $request)
    {
        $this->validate($request,[
            'nama_jabatan' => 'required|unique:jabatans,nama_jabatan'
        ],[
            'nama_jabatan.required' => 'Nama Jabatan Tidak Boleh Kosong',
            'nama_jabatan.unique' => 'Nama Jabatan Sudah  Ada',
        ]);

        $jabatan = New Jabatan;
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $success = $jabatan->save();
        if ($success) {
            return response()->json([
                'success' => true,
                'message' => 'Jabatan Berhasil Dibuat'
            ]);
        }
    }
    public function addPegawai(Request $request)
    {
        $pegawai = New Pegawai;
        $pegawai->nama_pgw = $request->nama_pgw;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->alamat = $request->alamat;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->jabatan_id = $request->jabatan_id;
        $success = $pegawai->save();
        if ($success){
            return response()->json([
                'success' =>true,
                'message' => 'Data Pegawai Berhasil diBuat'
            ]);
        }
    }

    public function editJabatan(Request $request, $id)
    {
        $this->validate($request,[
            'nama_jabatan' => 'required'
        ],[
            'nama_jabatan.required' => 'Nama Jabatan Tidak Boleh Kosong',
        ]);
        
        $jabatan = Jabatan::find($id);
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $success = $jabatan->save();
        if ($success){
            return response()->json([
                'success' =>true,
                'message' =>'Jabatan Berhasil di Edit'
            ]);
        }
    }

    public function deleteJabatan($id)
    {
        $jabatan = Jabatan::find($id);
        $success = $jabatan->delete();
        if ($success){
            return response()->json([
                'success' =>true,
                'message' => 'Jabatan Berhasil diHapus'
            ]);
        }
    }
}
