<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KelompokNilaisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kelompok_nilais')->delete();
        
        \DB::table('kelompok_nilais')->insert(array (
            0 => 
            array (
                'id' => 1,
                'kelas_id' => 1,
                'nama_kelompok' => 'UH1',
                'created_at' => '2021-11-02 22:28:37',
                'updated_at' => '2021-11-02 22:28:37',
            ),
        ));
        
        
    }
}