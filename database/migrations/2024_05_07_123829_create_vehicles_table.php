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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sacco_id')->constrained();
            $table->string('number_plate')->unique();
            $table->enum('type', ['bus', 'matatu', 'taxi', 'lorry', 'motorcycle', 'bicycle'])->default('bus');
            $table->string('color');
            $table->timestamps();

            $table->index('sacco_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
