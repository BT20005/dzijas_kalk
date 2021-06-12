<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_accounts', function (Blueprint $table) {
            $table->id();
            //$table->timestamps();
<<<<<<< HEAD
            // $table->increments('id');
            // $table->unsignedInteger('user_id');
=======
            //$table->increments('id');
            //$table->unsignedInteger('user_id');
>>>>>>> e483b8175fcbe6bee53a05ecd55e1a8abc6728a5
            $table->string('provider_id');
            $table->string('provider');
            $table->string('token');
            $table->timestamps();

            $table->foreignID('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_accounts');
    }
}
