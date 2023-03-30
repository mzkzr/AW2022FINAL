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
            $table->string('domicilio');
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('productor_id')->nullable()->references('id')->on('productor')->nullOnDelete();
            $table->foreignId('localidad_id')->references('id')->on('localidad')->cascadeOnDelete();
            $table->string('horario_atencion')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
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
