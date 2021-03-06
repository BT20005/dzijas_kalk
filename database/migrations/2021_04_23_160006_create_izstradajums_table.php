<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIzstradajumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('izstradajums', function (Blueprint $table) {
            $table->id();
            $table->string('nosaukums');
            $table->text('apraksts');
            $table->string('izmers');
            $table->integer('garums');
            $table->foreignId('veids_id')->constrained()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('izstradajums');
    }
}
