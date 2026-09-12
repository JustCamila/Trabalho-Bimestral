<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pizza;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Pizza::create([
            'nome' => 'Calabresa',
            'descricao' => 'Molho de tomate, mussarela e calabresa',
            'preco' => 45.90,
            'categoria_id' => 1,
        ]);

        Pizza::create([
            'nome' => 'Mussarela',
            'descricao' => 'Molho de tomate, mussarela e manjericão',
            'preco' => 42.00,   
            'categoria_id' => 1,
        ]);
    }
}
