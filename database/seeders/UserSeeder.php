<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
                'nama' => 'Hadi1',
                'username' => 'hadi1',
                'password' => Hash::make('123'),
                'level' => 'Super Admin',
        ])->assignRole('super_admin');

        User::create([
                'nama' => 'Hadi2',
                'username' => 'hadi2',
                'password' => Hash::make('123'),
                'level' => 'Admin',
        ])->assignRole('admin');

        User::create([
                'nama' => 'Hadi3',
                'username' => 'hadi3',
                'password' => Hash::make('123'),
                'level' => 'Wali Kelas',
        ])->assignRole('wali_kelas');
    }
}
