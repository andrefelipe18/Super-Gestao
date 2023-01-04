<?php

namespace Database\Seeders;

use App\Models\MotivoContato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotivosContatosATTSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivoContato::create([
            'motivo_contato' => 'Sugestão'
        ]);
        MotivoContato::create([
            'motivo_contato' => 'Outros'
        ]);
    }
}
