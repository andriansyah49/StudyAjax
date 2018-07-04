<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Jabatan extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['nama_jabatan'];
    protected $dates = ['deleted_at'];

    public function Pegawai()
    {
        return $this->hasMany('App\Model\Pegawai', 'jabatan_id');
    }
}
