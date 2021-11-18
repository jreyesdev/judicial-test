<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pass = bcrypt('12345678');
        $users = [
            [
                'name' => 'Administrador',
                'email' => 'admin@gmail.com',
                'rol' => 'administrador'
            ],
            [
                'name' => 'Cliente 1',
                'email' => 'cliente1@gmail.com',
                'rol' => 'cliente'
            ],
            [
                'name' => 'Cliente 2',
                'email' => 'cliente2@gmail.com',
                'rol' => 'cliente'
            ]
        ];
        foreach ($users as $user) {
            $u = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $pass
            ]);
            RoleUser::create([
                'user_id' => $u->id,
                'role_id' => Role::whereName($user['rol'])->first()->id
            ]);
        }
    }
}
