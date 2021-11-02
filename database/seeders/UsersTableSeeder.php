<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Hadi1',
                'username' => 'hadi1',
                'password' => '$2y$10$WU0hYOKTxKnXZrLqftyo8eF3FOXf9Tao2hpn0xHztiCdlJuDwB4oq',
                'level' => 'Super Admin',
                'remember_token' => NULL,
                'created_at' => '2021-11-02 14:41:44',
                'updated_at' => '2021-11-02 14:41:44',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Hadi2',
                'username' => 'hadi2',
                'password' => '$2y$10$iqxKqmnNo8jtPRomuqeCG.Nd3EtUrPOXi9s4iANJ2Cw.8rTnsjuMu',
                'level' => 'Admin',
                'remember_token' => NULL,
                'created_at' => '2021-11-02 14:41:44',
                'updated_at' => '2021-11-02 14:41:44',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'dsffs',
                'username' => 'siswa',
                'password' => '$2y$10$ggmFd9QN0yI29T1LiqbpVO2/btzf.1TJwdqZR50d4dS9pbRqx7xVa',
                'level' => 'Siswa',
                'remember_token' => NULL,
                'created_at' => '2021-11-02 22:27:59',
                'updated_at' => '2021-11-02 22:27:59',
            ),
        ));
        
        
    }
}