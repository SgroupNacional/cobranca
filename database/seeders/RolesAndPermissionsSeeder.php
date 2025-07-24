<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        
        Permission::firstOrCreate(['name' => 'dashboard-cobrança', 'guard_name' => 'web']);
        //Permission::create(['name' => 'dashboard-cobrança']);
        Permission::create(['name' => 'criar-usuario']);
        Permission::create(['name' => 'editar-usuario']);

        $admin = Role::create(['name' => 'superadmin']);

        $admin->syncPermissions(Permission::all());
    }
}
