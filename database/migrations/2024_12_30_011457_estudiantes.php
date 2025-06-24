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

        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('cedula');
            $table->enum('grado',['1er Grado','2do Grado','3er Grado','4to Grado', '5to Grado', '6to Grado']);
            $table->integer('periodo');
            $table->date('fecha_nacimiento');
            $table->enum('estatus', ['activo', 'inactivo'])->default('activo');;
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
        Schema::dropIfExists('estudiantes');
    }
};
