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
        Schema::create('sulfurs', function (Blueprint $table) {
            $table->id();
            $table->double('su_ar')->nullable();
            $table->double('su_adb')->nullable();
            $table->double('su_db')->nullable();
            $table->double('su_daf')->nullable();
            $table->string('su_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sulfurs');
    }
};
