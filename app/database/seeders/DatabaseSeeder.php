<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'glauco starling',
            'email' => 'glauco@gmail.com',
            'password' => 'password'
        ]);

        $this->call([
            FornecedorSeeder::class,
            MotivoContatoSeeder::class,
            SiteContatoSeeder::class,
            UnidadeSeeder::class,
            ProdutoSeeder::class
        ]);
    }
}
