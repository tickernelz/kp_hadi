<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SiswasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('siswas')->delete();
        
        \DB::table('siswas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 3,
                'kelas_id' => 1,
                'nis' => '321',
                'created_at' => '2021-11-02 22:27:59',
                'updated_at' => '2021-11-02 22:27:59',
            ),
        ));
        
        
    }
}