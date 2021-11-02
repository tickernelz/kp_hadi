<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(TahunAjaranSeeder::class);
        $this->call(SiswasTableSeeder::class);
        $this->call(MataPelajaransTableSeeder::class);
        $this->call(KelompokNilaisTableSeeder::class);
        $this->call(NilaisTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
    }
}
