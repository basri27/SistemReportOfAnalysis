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
        Schema::create('ashes', function (Blueprint $table) {
            $table->id();
            $table->double('ash_ar')->nullable();
            $table->double('ash_adb')->nullable();
            $table->double('ash_db')->nullable();
            $table->double('ash_daf')->nullable();
            $table->string('ash_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ashes');
    }
};
