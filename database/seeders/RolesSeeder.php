<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['administrador', 'cliente'];
        foreach ($roles as $rol) {
            Role::create([
                'name' => $rol
            ]);
        }
    }
}
