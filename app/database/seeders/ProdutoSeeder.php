<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Produto::create([
            'nome' => 'Geladeira',
            'descricao' => 'Geladeira de gordo',
            'peso' => 60,
            'unidade_id' => 1
        ]);
    }
}
