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
        Schema::create('grosses', function (Blueprint $table) {
            $table->id();
            $table->integer('gr_ar')->nullable();
            $table->integer('gr_adb')->nullable();
            $table->integer('gr_db')->nullable();
            $table->integer('gr_daf')->nullable();
            $table->string('gr_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grosses');
    }
};
