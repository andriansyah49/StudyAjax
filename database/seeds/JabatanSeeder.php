<?php

use Illuminate\Database\Seeder;

//model
use App\Model\Jabatan;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatan = new Jabatan;
        $jabatan->nama_jabatan = "OB";
        $jabatan->save();

        $jabatan = new Jabatan;
        $jabatan->nama_jabatan = "Karyawan";
        $jabatan->save();

        $jabatan = new Jabatan;
        $jabatan->nama_jabatan = "Manager";
        $jabatan->save();

        $jabatan = new Jabatan;
        $jabatan->nama_jabatan = "HRD";
        $jabatan->save();

        $jabatan = new Jabatan;
        $jabatan->nama_jabatan = "Administrasi";
        $jabatan->save();
        // factory(App\Model\Jabatan::class,150)->create();
    }
}
