<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MataPelajaransTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mata_pelajarans')->delete();
        
        \DB::table('mata_pelajarans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_mapel' => 'IPA',
                'created_at' => '2021-11-02 22:28:16',
                'updated_at' => '2021-11-02 22:28:16',
            ),
        ));
        
        
    }
}