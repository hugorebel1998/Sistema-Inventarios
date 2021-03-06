<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['Activo', 'Bloqueado'])->default('Activo');
            $table->string('name');
            $table->string('apellido_p');
            $table->string('apellido_m');
            $table->enum('perfil',['Administrador', 'Colaborador'])->default('Administrador')->nullable();
            $table->string('email')->unique();
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('telefono', 10);
            $table->string('password');
            $table->string('imagen_usuario')->nullable();
            $table->string('permiso');
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
