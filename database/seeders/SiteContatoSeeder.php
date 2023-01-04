<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\SiteContato;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    use HasFactory;
    public function run()
    {
        \App\Models\SiteContato::factory()->count(20)->create();
    }
}
