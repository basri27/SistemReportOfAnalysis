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
        Schema::create('astms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proximate_id')->constrained();
            $table->foreignId('gross_id')->constrained();
            $table->foreignId('sulfur_id')->constrained();
            $table->foreignId('total_moist_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('astms');
    }
};
