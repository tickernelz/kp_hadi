<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'kelola user']);
        Permission::create(['name' => 'kelola siswa']);
        Permission::create(['name' => 'kelola tahun ajaran']);
        Permission::create(['name' => 'kelola mata pelajaran']);
        Permission::create(['name' => 'kelola kelas']);
        Permission::create(['name' => 'kelola wali kelas']);
        Permission::create(['name' => 'kelola kelompok nilai']);
        Permission::create(['name' => 'kelola nilai']);
        Permission::create(['name' => 'melihat nilai']);

        $role1 = Role::create([
            'name' => 'super_admin',
            'guard_name' => 'web',
        ]);
        $role1->givePermissionTo('kelola user');
        $role1->givePermissionTo('kelola siswa');
        $role1->givePermissionTo('kelola tahun ajaran');
        $role1->givePermissionTo('kelola mata pelajaran');
        $role1->givePermissionTo('kelola kelas');
        $role1->givePermissionTo('kelola wali kelas');
        $role1->givePermissionTo('kelola kelompok nilai');
        $role1->givePermissionTo('kelola nilai');
        $role1->givePermissionTo('melihat nilai');

        $role2 = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);
        $role2->givePermissionTo('kelola siswa');
        $role2->givePermissionTo('kelola tahun ajaran');
        $role2->givePermissionTo('kelola mata pelajaran');
        $role2->givePermissionTo('kelola kelas');
        $role2->givePermissionTo('kelola wali kelas');
        $role2->givePermissionTo('kelola kelompok nilai');
        $role2->givePermissionTo('kelola nilai');
        $role2->givePermissionTo('melihat nilai');

        $role3 = Role::create([
            'name' => 'wali_kelas',
            'guard_name' => 'web',
        ]);
        $role3->givePermissionTo('kelola nilai');
        $role3->givePermissionTo('melihat nilai');

        $role4 = Role::create([
            'name' => 'siswa',
            'guard_name' => 'web',
        ]);
        $role4->givePermissionTo('melihat nilai');
    }
}
