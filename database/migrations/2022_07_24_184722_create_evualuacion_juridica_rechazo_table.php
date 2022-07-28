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
        Schema::create('evualuacion_juridica_rechazo', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('consulta_fk');
            $table->longtext('motivo_rechazo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evualuacion_juridica_rechazo');
    }
};
