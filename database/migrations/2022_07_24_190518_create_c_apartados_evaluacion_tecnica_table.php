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
        Schema::create('c_apartados_evaluacion_tecnica', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('categoria_evaluacion_tecnica_fk');
            $table->string('descripcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_apartados_evaluacion_tecnica');
    }
};
