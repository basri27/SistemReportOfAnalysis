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
        Schema::create('proximates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('moist_id')->constrained();
            $table->foreignId('volatile_id')->constrained();
            $table->foreignId('carbon_id')->constrained();
            $table->foreignId('ash_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proximates');
    }
};
