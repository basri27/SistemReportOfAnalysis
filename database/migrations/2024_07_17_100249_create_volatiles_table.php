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
        Schema::create('volatiles', function (Blueprint $table) {
            $table->id();
            $table->double('vo_ar')->nullable();
            $table->double('vo_adb')->nullable();
            $table->double('vo_db')->nullable();
            $table->double('vo_daf')->nullable();
            $table->string('vo_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volatiles');
    }
};
