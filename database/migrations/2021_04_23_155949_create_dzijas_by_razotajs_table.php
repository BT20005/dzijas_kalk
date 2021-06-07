<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDzijasByRazotajsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dzijas_by_razotajs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('dzija_id')->constrained()->nullab();
            $table->foreignId('razotajs_id')->constrained()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dzijas_by_razotajs');
    }
}
