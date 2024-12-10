<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->id(); // Crea un campo ID autoincremental para la tabla 'role_user'
            $table->unsignedBigInteger('user_id'); // Campo para almacenar el ID del usuario
            $table->unsignedBigInteger('role_id'); // Campo para almacenar el ID del rol
            $table->timestamps(); // Crea campos 'created_at' y 'updated_at' para la gestión de fechas

            // Define las claves foráneas para mantener la integridad referencial
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_user'); // Elimina la tabla 'role_user' si existe
    }
};
