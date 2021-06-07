<?php

namespace Database\Seeders;

use App\Models\Veids;
use Illuminate\Database\Seeder;


class VeidsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Veids::truncate();
        Veids::create(['id' => 1, 'nosaukums' => 'Zeķes']);
        Veids::create(['id' => 2, 'nosaukums' => 'Cepure']);
        Veids::create(['id' => 3, 'nosaukums' => 'Lakats']);
        Veids::create(['id' => 4, 'nosaukums' => 'Jaka']);
    }
}
