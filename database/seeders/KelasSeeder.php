<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelas::create([
            'nama_kelas' => '1A',
        ]);
        Kelas::create([
            'nama_kelas' => '1B',
        ]);
        Kelas::create([
            'nama_kelas' => '2A',
        ]);
        Kelas::create([
            'nama_kelas' => '2B',
        ]);
        Kelas::create([
            'nama_kelas' => '3A',
        ]);
        Kelas::create([
            'nama_kelas' => '3B',
        ]);
        Kelas::create([
            'nama_kelas' => '4A',
        ]);
        Kelas::create([
            'nama_kelas' => '4B',
        ]);
        Kelas::create([
            'nama_kelas' => '5A',
        ]);
        Kelas::create([
            'nama_kelas' => '5B',
        ]);
        Kelas::create([
            'nama_kelas' => '6A',
        ]);
        Kelas::create([
            'nama_kelas' => '6B',
        ]);
    }
}
