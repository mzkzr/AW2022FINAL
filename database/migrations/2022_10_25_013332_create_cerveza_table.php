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
        Schema::create('cerveza', function (Blueprint $table) {
            $table->id();
            $table->foreignId('productor_id')->references('id')->on('productor')->onDelete('cascade');
            $table->string('nombre');
            $table->integer('ibu')->nullable();
            $table->float('abv')->nullable();
            $table->integer('srm')->nullable();
            $table->integer('og')->nullable();
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
        Schema::dropIfExists('cerveza');
    }
};
