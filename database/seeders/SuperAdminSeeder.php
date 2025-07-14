<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Garantir que a role 'superadmin' existe
        Role::firstOrCreate(['name' => 'superadmin']);

        // Lista de usuários a serem criados
        $users = [
            ['name' => 'André Jálisson',  'email' => 'andrejalisson@gmail.com'],
            ['name' => 'Gustavo Mathias','email' => 'gustavomatiasbernardo@hotmail.com'],
            ['name' => 'Leônidas Neto',  'email' => 'leonidasneto88@gmail.com'],
            ['name' => 'Luiz Cruz',      'email' => 'luiscruzdesign@gmail.com'],
        ];

        // Senha padrão para todos
        $defaultPassword = 'Sgroup@2025#';

        foreach ($users as $data) {
            // Cria ou atualiza o usuário
            $user = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name'     => $data['name'],
                    'password' => Hash::make($defaultPassword),
                ]
            );

            // Atribui a role de superadmin
            if (! $user->hasRole('superadmin')) {
                $user->assignRole('superadmin');
            }
        }
    }
}
