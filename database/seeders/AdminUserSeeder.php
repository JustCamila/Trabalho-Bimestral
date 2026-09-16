<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            'name' => 'Administrador',
            'email' => 'admin@pizzaria.com',
            'password' => Hash::make('adm123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Cliente',
            'email' => 'cliente@pizzaria.com',
            'password' => Hash::make('cliente123'),
            'role' => 'cliente',
        ]);

        User::create([
            'name' => 'Funcionário',
            'email' => 'funcionario@pizzaria.com',
            'password' => Hash::make('func123'),
            'role' => 'funcionario',
        ]);


        
    }
}
