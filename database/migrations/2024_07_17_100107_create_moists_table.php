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
        Schema::create('moists', function (Blueprint $table) {
            $table->id();
            $table->double('mo_ar')->nullable();
            $table->double('mo_adb')->nullable();
            $table->double('mo_db')->nullable();
            $table->double('mo_daf')->nullable();
            $table->string('mo_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moists');
    }
};
