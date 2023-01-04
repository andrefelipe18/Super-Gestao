<?php

namespace Database\Seeders;

use App\Models\MotivoContato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivoContato::create([
           'motivo_contato' => 'Dúvida'
        ]);
        MotivoContato::create([
           'motivo_contato' => 'Elogio'
        ]);
        MotivoContato::create([
            'motivo_contato' => 'Reclamação'
        ]);
    }
}
