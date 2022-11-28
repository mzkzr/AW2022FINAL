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
        Schema::create('cerveceria', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->biginteger('cuit')->unique();
            $table->string('domicilio');
            $table->foreignId('provincia_id')->references('id')->on('provincia')->onDelete('cascade');
            $table->foreignId('localidad_id')->references('id')->on('localidad')->onDelete('cascade');
            $table->string('horario_atencion')->nullable();
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
        Schema::dropIfExists('cerveceria');
    }
};
