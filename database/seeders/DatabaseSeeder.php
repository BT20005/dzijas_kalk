<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call(VeidsSeeder::class);
        $this->call(RazotajsSeeder::class);
        $this->call(DzijaSeeder::class);
        $this->call(IzstradajumsSeeder::class);
        Schema::enableForeignKeyConstraints();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // create an admin user with email admin@kalk.test and password slepens
        User::truncate();
        User::create(array('name' => 'Administrator',
                           'email' => 'admin@kalk.test', 
                           'password' => bcrypt('slepens'),
                           'role' => 1));
        User::create(array('name' => 'Brigita',
                           'email' => 'brigita@inbox.lv', 
                           'password' => bcrypt('brigita'),
                           'role' => 0));   
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        } 
}
