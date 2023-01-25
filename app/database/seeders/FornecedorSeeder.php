<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Fornecedor::create([
            'nome' => 'Fornecedor 100',
            'site' => 'fornecedor100@gmail.com',
            'uf' => 'CE',
            'email' => 'contato@fornecedor100.com.br'
        ]);

        \App\Models\Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor200@gmail.com',
            'uf' => 'RS',
            'email' => 'contato@fornecedor200.com.br'
        ]);
    }
}
