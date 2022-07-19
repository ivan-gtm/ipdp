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
        Schema::create('cedulas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedbiginteger('folio');
            $table->integer('status')->default('1');
            $table->string('primer_apellido');
            $table->string('nombre');
            $table->string('segundo_apellido');
            $table->integer('edad');
            $table->string('ocupacion');
            $table->string('genero');
            $table->string('correo');
            $table->string('celular');
            $table->string('calle');
            $table->string('num_exterior');
            $table->string('num_interior');
            $table->string('manzana');
            $table->string('cp');
            $table->string('alcaldia');
            $table->string('colonia');
            $table->string('representante');
            $table->string('instrumento_observar');
            $table->longtext('comentarios');
            $table->boolean('incluye_documentos');
            $table->integer('numero_documentos');
            $table->string('conocimiento_datos_personales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cedulas');
    }
};
