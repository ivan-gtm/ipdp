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
        Schema::create('consulta_indigena', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
            $table->unsignedbiginteger('folio');
            $table->integer('status')->default('1');
            $table->string('tipoConsulta');
            $table->string('fechaSolicitud');
            $table->string('nombreCompleto');
            $table->string('correo');
            $table->string('telefono',10);
            $table->string('tieneDatosParticipante',3);
            $table->string('esRepresentante',3);
            $table->string('tipoAutoridad')->nullable();
            $table->string('nombrePuebloComunidad')->nullable();
            $table->string('tipoOrganizacion')->nullable();
            $table->string('nombreOrganizacion')->nullable();
            $table->string('nombre');
            $table->string('primerApellido');
            $table->string('segundoApellido');
            $table->integer('edad');
            $table->string('ocupacion');
            $table->string('optionGenero');
            $table->string('celular');
            $table->string('calle');
            $table->string('numExterior');
            $table->string('numInterior');
            $table->string('manzana');
            $table->string('cp');
            $table->string('alcaldia');
            $table->string('colonia');
            $table->string('tipoParticipacion');
            $table->string('participacionOtro')->nullable();
            $table->string('nombreActividad')->nullable();
            $table->string('fechaActividad')->nullable();
            $table->string('lugarActividad')->nullable();
            $table->string('numeroDocumentos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consulta_indigena');
    }
};
