<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saints', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('imagen');
            $table->string('nombre');
            $table->string('constelacion');
            $table->string('pais');
            $table->string('edad');
            $table->string('serie');
            $table->string('clase');
            $table->string('informacion');
            $table->string('slug',90)->unique();            
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
        Schema::dropIfExists('saints');
    }
}
