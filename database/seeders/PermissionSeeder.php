<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'visualizar dashboard',
            'visualizar motoristas',
            'gerenciar motoristas',
            'visualizar veículos',
            'gerenciar veículos',
            'visualizar secretarias',
            'gerenciar secretarias',
            'visualizar monitores',
            'gerenciar monitores',
            'visualizar usuários',
            'gerenciar usuários',
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission]);
        }

        $adminRole = Role::updateOrCreate(['name' => 'admin']);
        $adminRole->syncPermissions($permissions);

        $userRole = Role::updateOrCreate(['name' => 'user']);
        $userRole->syncPermissions([
            'visualizar dashboard',
            'visualizar motoristas',
            'visualizar veículos',
            'visualizar secretarias',
            'visualizar monitores',
            'visualizar usuários',
        ]);
        
    }
}
        // Tornar todos os usuários existentes administradores
        $users = \App\Models\User::all();
        foreach ($users as $user) {
            $user->assignRole('admin');
        }