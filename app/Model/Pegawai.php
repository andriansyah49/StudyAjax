<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = ['nama_pgw','jenis_kelamin','alamat','no_hp','jabatan_id'];
    

    public function Jabatan()
    {
        return $this->belongsTo('App\Model\Jabatan', 'jabatan_id');
    }
}
