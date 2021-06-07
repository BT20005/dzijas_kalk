<?php

namespace Database\Seeders;

use App\Models\Izstradajums;
use Illuminate\Database\Seeder;

class IzstradajumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Izstradajums::truncate();
        Izstradajums::create(['id' => 1, 'nosaukums' => 'Vīriešu', 'apraksts' => 'Vienkāršas vīriešu zeķes.', 'izmers' => '42-46', 'garums' => 385, 'veids_id' => 1]);
        Izstradajums::create(['id' => 2, 'nosaukums' => 'Sieviešu', 'apraksts' => 'Vienkāršas sieviešu zeķes.', 'izmers' => '38-41', 'garums' => 335, 'veids_id' => 1]);
        Izstradajums::create(['id' => 3, 'nosaukums' => 'Pusaudžu', 'apraksts' => 'Vienkāršas pusaudžu zeķes.', 'izmers' => '34-37', 'garums' => 285, 'veids_id' => 1]);
        Izstradajums::create(['id' => 4, 'nosaukums' => 'Bērnu', 'apraksts' => 'Vienkāršas bērnu zeķes.', 'izmers' => '28-33', 'garums' => 220, 'veids_id' => 1]);
        Izstradajums::create(['id' => 5, 'nosaukums' => 'Mazs', 'apraksts' => 'Lakats 100cm x 100cm.', 'izmers' => 'S', 'garums' => 800, 'veids_id' => 3]);
        Izstradajums::create(['id' => 6, 'nosaukums' => 'Vidējs', 'apraksts' => 'Lakats 150cm x 150cm.', 'izmers' => 'M', 'garums' => 1200, 'veids_id' => 3]);
        Izstradajums::create(['id' => 7, 'nosaukums' => 'Liels', 'apraksts' => 'Lakats 200cm x 200cm.', 'izmers' => 'L', 'garums' => 1600, 'veids_id' => 3]);
        Izstradajums::create(['id' => 8, 'nosaukums' => 'Sieviešu jaka', 'apraksts' => 'Sieviešu jaka ar pīnēm.', 'izmers' => '36', 'garums' => 1200, 'veids_id' => 4]);
        Izstradajums::create(['id' => 9, 'nosaukums' => 'Sieviešu jaka', 'apraksts' => 'Sieviešu jaka ar pīnēm.', 'izmers' => '38', 'garums' => 1320, 'veids_id' => 4]);
        Izstradajums::create(['id' => 10, 'nosaukums' => 'Sieviešu jaka', 'apraksts' => 'Sieviešu jaka ar pīnēm.', 'izmers' => '40', 'garums' => 1400, 'veids_id' => 4]);
        Izstradajums::create(['id' => 11, 'nosaukums' => 'Sieviešu jaka', 'apraksts' => 'Sieviešu jaka ar pīnēm.', 'izmers' => '42', 'garums' => 1480, 'veids_id' => 4]);
        Izstradajums::create(['id' => 12, 'nosaukums' => 'Sieviešu jaka', 'apraksts' => 'Sieviešu jaka ar pīnēm.', 'izmers' => '44', 'garums' => 1550, 'veids_id' => 4]);
        Izstradajums::create(['id' => 13, 'nosaukums' => 'Zīdainis', 'apraksts' => 'Jaundzimuša bērna cepurīte.', 'izmers' => '0', 'garums' => 100, 'veids_id' => 2]);
        Izstradajums::create(['id' => 14, 'nosaukums' => 'Mazs bērns', 'apraksts' => 'Bērns vecumā līdz 7 gadi.', 'izmers' => '1', 'garums' => 150, 'veids_id' => 2]);
        Izstradajums::create(['id' => 15, 'nosaukums' => 'Bērns', 'apraksts' => 'Bērns vecumā līdz 10 gadi.', 'izmers' => '2', 'garums' => 200, 'veids_id' => 2]);
    }
}