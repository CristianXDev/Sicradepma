<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });

        // Insertar los estados de Venezuela
        $estados = [
            ['nombre' => 'Amazonas'],
            ['nombre' => 'Anzoátegui'],
            ['nombre' => 'Apure'],
            ['nombre' => 'Aragua'],
            ['nombre' => 'Barinas'],
            ['nombre' => 'Bolívar'],
            ['nombre' => 'Carabobo'],
            ['nombre' => 'Cojedes'],
            ['nombre' => 'Delta Amacuro'],
            ['nombre' => 'Falcón'],
            ['nombre' => 'Guárico'],
            ['nombre' => 'Lara'],
            ['nombre' => 'Mérida'],
            ['nombre' => 'Miranda'],
            ['nombre' => 'Monagas'],
            ['nombre' => 'Nueva Esparta'],
            ['nombre' => 'Portuguesa'],
            ['nombre' => 'Sucre'],
            ['nombre' => 'Táchira'],
            ['nombre' => 'Trujillo'],
            ['nombre' => 'Vargas'],
            ['nombre' => 'Yaracuy'],
            ['nombre' => 'Zulia'],
            ['nombre' => 'Distrito Capital']
        ];
        DB::table('estados')->insert($estados);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados');
    }
};

