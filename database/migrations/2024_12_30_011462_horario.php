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
    public function up(){

        Schema::create('horario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_seccion');
            $table->foreign('id_seccion')->references('id')->on('secciones');
            $table->unsignedBigInteger('id_profesor');
            $table->foreign('id_profesor')->references('id')->on('profesores');
            $table->enum('dia_semana', ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes']);
            $table->text('actividad');
            $table->time('hora_ini');
            $table->time('hora_fin');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horario');
    }
};
