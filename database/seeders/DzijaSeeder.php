<?php

namespace Database\Seeders;

use App\Models\Dzija;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DzijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dzija::truncate();
        Dzija::create(['id' => 1, 'nosaukums' => 'ITO-sensai', 'garums' => 225, 'apraksts' => 'Dzija gardēžiem. Eleganta un viegla kā pūciņa.', 'razotajs_id' => 1]);
        Dzija::create(['id' => 2, 'nosaukums' => 'ITO-gima', 'garums' => 250, 'apraksts' => 'Dzija gardēžiem. GIMA 8.5, pateicoties īpašam apstrādes procesam, ir unikāla, neparasta izskata kokvilnas dzija, piemērota vieglu vasaras apģērbu un aksesuāru adīšanai.', 'razotajs_id' => 1]);
        Dzija::create(['id' => 3, 'nosaukums' => 'ITO-shio', 'garums' => 450, 'apraksts' => 'Dzija gardēžiem.SHIO ir īpaši maiga merīnvilna.', 'razotajs_id' => 1]);
        Dzija::create(['id' => 4, 'nosaukums' => 'ITO-shimo', 'garums' => 325, 'apraksts' => 'Dzija gardēžiem. Shimo ITO ir klasiskā stilā vērpta vilnas dzija ar raupja tvīda tekstūru.', 'razotajs_id' => 1]);
        Dzija::create(['id' => 5, 'nosaukums' => 'rustic vivid', 'garums' => 425, 'apraksts' => 'Īpašas kvalitātes vilna no Spānijas.', 'razotajs_id' => 2]);
        Dzija::create(['id' => 6, 'nosaukums' => 'rustic pastel', 'garums' => 425, 'apraksts' => 'Īpašas kvalitātes vilna no Spānijas.', 'razotajs_id' => 2]);
        Dzija::create(['id' => 7, 'nosaukums' => 'rustic natural', 'garums' => 425, 'apraksts' => 'Īpašas kvalitātes vilna no Spānijas.', 'razotajs_id' => 2]);
        Dzija::create(['id' => 8, 'nosaukums' => 'marina', 'garums' => 600, 'apraksts' => 'Merinvilna no Urugvajas. Krāsota ar rokām.', 'razotajs_id' => 3]);
        Dzija::create(['id' => 9, 'nosaukums' => 'alegria', 'garums' => 400, 'apraksts' => 'Top klases zeķu dzija no Urugvajas. Krāsota ar rokām.', 'razotajs_id' => 3]);
        Dzija::create(['id' => 10, 'nosaukums' => 'silk blend fino', 'garums' => 600, 'apraksts' => 'Manos Silk Blend Fino - izmeklēts merīnvilnas un zīda apvienojums no Urugvajas. Krāsota ar rokām.', 'razotajs_id' => 3]);

        DB::table('dzijas_by_razotajs')->truncate();
        DB::table('dzijas_by_razotajs')->insert(['dzija_id' => 1, 'razotajs_id' => 1]);
        DB::table('dzijas_by_razotajs')->insert(['dzija_id' => 2, 'razotajs_id' => 1]);
        DB::table('dzijas_by_razotajs')->insert(['dzija_id' => 3, 'razotajs_id' => 1]);
        DB::table('dzijas_by_razotajs')->insert(['dzija_id' => 4, 'razotajs_id' => 1]);
        DB::table('dzijas_by_razotajs')->insert(['dzija_id' => 5, 'razotajs_id' => 2]);
        DB::table('dzijas_by_razotajs')->insert(['dzija_id' => 6, 'razotajs_id' => 2]);
        DB::table('dzijas_by_razotajs')->insert(['dzija_id' => 7, 'razotajs_id' => 2]);
        DB::table('dzijas_by_razotajs')->insert(['dzija_id' => 8, 'razotajs_id' => 3]);
        DB::table('dzijas_by_razotajs')->insert(['dzija_id' => 9, 'razotajs_id' => 3]);
        DB::table('dzijas_by_razotajs')->insert(['dzija_id' => 10, 'razotajs_id' => 3]);
    }
}