<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeria_cerveceria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cerveceria_id')->references('id')->on('cerveceria')->cascadeOnDelete();
            $table->foreignId('imagen_id')->references('id')->on('imagen')->cascadeOnDelete();
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
        Schema::dropIfExists('galeria_cerveceria');
    }
};
