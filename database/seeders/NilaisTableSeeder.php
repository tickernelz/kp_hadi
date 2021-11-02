<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NilaisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('nilais')->delete();
        
        \DB::table('nilais')->insert(array (
            0 => 
            array (
                'id' => 1,
                'siswa_id' => 1,
                'mata_pelajaran_id' => 1,
                'kelompok_nilai_id' => 1,
                'tahun_ajaran_id' => 1,
                'semester' => 'ganjil',
                'nilai' => 100.0,
                'created_at' => '2021-11-02 22:29:59',
                'updated_at' => '2021-11-02 22:29:59',
            ),
        ));
        
        
    }
}