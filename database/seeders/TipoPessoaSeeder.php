<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exists = DB::table('tipos_pessoas')->exists();

        
        if (!$exists) {
            DB::table('tipos_pessoas')->insert([
                ['codigo' => 'PF', 'descricao' => 'Pessoa Física'],
                ['codigo' => 'PJ', 'descricao' => 'Pessoa Jurídica'],
            ]);
        }
    }
}
