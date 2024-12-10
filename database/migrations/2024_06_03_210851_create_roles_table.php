<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // Crea un campo ID autoincremental para la tabla 'roles'
            $table->string('guard_name')->unique(); // Crea un campo 'guard_name' único para el nombre del rol
            $table->timestamps(); // Crea campos 'created_at' y 'updated_at' para la gestión de fechas
        });

        // Inserta registros iniciales en la tabla 'roles'
        DB::table('roles')->insert([
            ['guard_name' => 'superadmin'],
            ['guard_name' => 'administrator'],
            ['guard_name' => 'trainer'],
            ['guard_name' => 'apprentice']
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('roles'); // Elimina la tabla 'roles' si existe
    }
};
