<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDzijasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dzijas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nosaukums');
            $table->integer('garums');
            $table->text('apraksts')->nullable();
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
        Schema::dropIfExists('dzijas');
    }
}
