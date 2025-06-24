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

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('rol', ['1', '2']); //1- Admin // 2- Secretaria
            $table->rememberToken();
            $table->timestamps();
        });

        // Insertar usuarios por defecto
        DB::table('users')->insert([
            [
                'name' => 'Yessica',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'), // Cifrar la contraseña
                'rol' => 1, // Rol del usuario
            ],
            [
                'name' => 'Genesis',
                'email' => 'secretaria@gmail.com',
                'password' => bcrypt('12345678'),
                'rol' => 2,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
