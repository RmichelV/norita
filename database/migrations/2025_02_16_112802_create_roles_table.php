<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();

        });

        DB::table('roles')->insert([
            ['name' => 'Super Administrador'],
            ['name' => 'Administrador'],
            ['name' => 'Vendedor'],
            ['name' => 'Contador'],
            ['name' => 'Almacen'],
            ['name' => 'Cliente'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
