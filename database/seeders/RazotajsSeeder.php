<?php

namespace Database\Seeders;

use App\Models\Razotajs;
use Illuminate\Database\Seeder;

class RazotajsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Razotajs::truncate();
        Razotajs::create(['id' => 1, 'nosaukums' => 'ITO']);
        Razotajs::create(['id' => 2, 'nosaukums' => 'dLana']);
        Razotajs::create(['id' => 3, 'nosaukums' => 'Manos']);
        Razotajs::create(['id' => 4, 'nosaukums' => 'Filcolana']);
        Razotajs::create(['id' => 5, 'nosaukums' => 'FONTY']);
        Razotajs::create(['id' => 6, 'nosaukums' => 'Schopell']);
        Razotajs::create(['id' => 7, 'nosaukums' => 'ISTEX']);
    }
}