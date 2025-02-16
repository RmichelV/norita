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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('cities')->insert([
            ['name' => 'LP'],
            ['name' => 'CBBA'],
            ['name' => 'SCZ'],
            ['name' => 'OR'],
            ['name' => 'PT'],
            ['name' => 'CH'],
            ['name' => 'TJ'],
            ['name' => 'BE'],
            ['name' => 'PA'],
            ['name' => 'SC'],
            ['name' => 'OT'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
