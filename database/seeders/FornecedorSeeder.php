<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $fon = new Fornecedor();
        $fon->nome = 'Fornecedor 1';
        $fon->site = 'fornecedor1.com.br';
        $fon->uf = 'SP';
        $fon->email = 'fornecedor1@fonfon.com';
        $fon->save();

        Fornecedor::create([
            'nome' => 'Fornecedor 2',
            'site' => 'fornecedor2.com.br',
            'uf' => 'RJ',
            'email' => 'fornecedor2@fonfon.com'
        ]);

        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 3',
            'site' => 'fornecedor3.com.br',
            'uf' => 'MG',
            'email' => 'fornecedor3.com.br'
        ]);
    }
}
