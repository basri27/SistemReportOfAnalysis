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
        Schema::create('total_moists', function (Blueprint $table) {
            $table->id();
            $table->double('tm_ar')->nullable();
            $table->double('tm_adb')->nullable();
            $table->double('tm_db')->nullable();
            $table->double('tm_daf')->nullable();
            $table->string('tm_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('total_moists');
    }
};
