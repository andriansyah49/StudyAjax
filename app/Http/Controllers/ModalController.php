<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Jabatan;
use App\Model\Pegawai;
class ModalController extends Controller
{
    //
    public function addJabatan()
    {
        $modal_size = 'modal-md';

        $modal_header = '<i class="fa fa-plus" aria-hidden="true"></i><span> Tambah</span> Jabatan';

        $modal_body = csrf_field()
                    .'<div class="form-group ">'
                        .'<label>Nama Jabatan</label>'
                        . '<input type="text" id="nama_jabatan" name="nama_jabatan" class="form-control">' 
                        .'<span class="help-block has-error nama_jabatan_error"></span>'
                        .'</div>';

        $modal_footer = '<button type="submit" class="btn btn-default" id="btn-save" value="add"> <i class="fa fa-check"></i> Simpan </button>';

        $data = array('modal_size' => $modal_size,'modal_header' => $modal_header, 'modal_body' => $modal_body, 'modal_footer' => $modal_footer);
        return $data;
    }

    public function editJabatan($id)
    {
        $jabatan = Jabatan::find($id);

        $modal_size = 'modal-md';

        $modal_header = '<i class="fa fa-pencil" aria-hidden="true"></i><span> Edit</span> Jabatan';

        $modal_body = csrf_field()
                    .'<input type="hidden" id="id" name="id">'
                    .'<div class="form-group">'
                        .'<label>Nama Jabatan</label>'
                        .'<input id="nama_jabatan" type="text" name="nama_jabatan" class="form-control">' 
                        .'<span class="help-block has-error nama_jabatan_error"></span>'
                        .'</div>';

        $modal_footer = '<button type="submit" class="btn btn-default" id="btn-save" value="edit"> <i class="fa fa-pencil"></i> Simpan </button>';

        $data = array('modal_size' => $modal_size,'modal_header' => $modal_header, 'modal_body' => $modal_body, 'modal_footer' => $modal_footer, 'jabatan' =>$jabatan);
        return $data;
    }

    public function addPegawai()
    {
        $jabatan = Jabatan::all();
        $foreach='';
        foreach ($jabatan as $key =>$value) {
           $foreach .= '<option value="'.$value->id.'">'.$value->nama_jabatan.'</option>';
        }
        $modal_size = 'modal-md';
        $modal_header = '<i class="fa fa-plus" aria-hidden="true"></i><span> Tambah</span> Pegawai';

        $modal_body = csrf_field()
                    .'<div class="form-group">'
                        .'<label>Nama Pegawai</label>'
                        . '<input type="text" name="nama_pgw" class="form-control">' 
                    .'</div>'
                    .'<div class="form-group">'
                        .'<label>Jenis Kelamin</label>'
                        .'<select name="jenis_kelamin" class="form-control">'
                            .'<option value="0">Laki-laki</option>'
                            .'<option value="1">Perempuan</option>' 
                        .'</select>'                            
                    .'</div>'
                    .'<div class="form-group">'
                        .'<label>Alamat</label>'
                        . '<input type="text" name="alamat" class="form-control">' 
                    .'</div>'
                    .'<div class="form-group">'
                        .'<label>No HP</label>'
                        . '<input type="text" name="no_hp" class="form-control">' 
                    .'</div>'
                    .'<div class="form-group">'
                        .'<label>Jabatan</label>'
                        . '<select name="jabatan_id" class="form-control">'
                        .$foreach
                        .'</select>' 
                    .'</div>';

        $modal_footer = '<button type="submit" class="btn btn-default" id="btn-save" value="add"> <i class="fa fa-check"></i> Simpan </button>';

        $data = array('modal_size' => $modal_size,'modal_header' => $modal_header, 'modal_body' => $modal_body, 'modal_footer' => $modal_footer);
        return $data;
    }

    public function editPegawai($id)
    {
        $pegawai = Pegawai::find($id);
        $jabatan = Jabatan::all();
        $foreach='';
        foreach ($jabatan as $key =>$value) {
           $foreach .= '<option value="'.$value->id.'">'.$value->nama_jabatan.'</option>';
        }
        $modal_size = 'modal-md';
        $modal_header = '<i class="fa fa-plus" aria-hidden="true"></i><span> Tambah</span> Pegawai';

        $modal_body = csrf_field()
                    .'<input type="hidden" name="id" id="id">'
                    .'<div class="form-group">'
                        .'<label>Nama Pegawai</label>'
                        . '<input type="text" name="nama_pgw" class="form-control">' 
                    .'</div>'
                    .'<div class="form-group">'
                        .'<label>Jenis Kelamin</label>'
                        .'<select name="jenis_kelamin" id="gender" class="form-control">'
                            .'<option value="0">Laki-laki</option>'
                            .'<option value="1">Perempuan</option>' 
                        .'</select>'                            
                    .'</div>'
                    .'<div class="form-group">'
                        .'<label>Alamat</label>'
                        . '<input type="text" name="alamat" id="alamat" class="form-control">' 
                    .'</div>'
                    .'<div class="form-group">'
                        .'<label>No HP</label>'
                        . '<input id="no_hp" type="text" name="no_hp" class="form-control">' 
                    .'</div>'
                    .'<div class="form-group">'
                        .'<label>Jabatan</label>'
                        . '<select id="jabatan_id" name="jabatan_id" class="form-control">'
                        .$foreach
                        .'</select>' 
                    .'</div>';

        $modal_footer = '<button type="submit" class="btn btn-default" id="btn-save" value="add"> <i class="fa fa-check"></i> Simpan </button>';

        $data = array('modal_size' => $modal_size,'modal_header' => $modal_header, 'modal_body' => $modal_body, 'modal_footer' => $modal_footer, 'pegawai'=>$pegawai);
        return $data;
    }
}

