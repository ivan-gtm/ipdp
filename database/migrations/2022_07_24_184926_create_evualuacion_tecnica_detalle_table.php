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
        Schema::create('evualuacion_tecnica_detalle', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('evualuacion_tecnica_fk');
            $table->integer('categoria_fk');
            $table->integer('apartado_fk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evualuacion_tecnica_detalle');
    }
};
