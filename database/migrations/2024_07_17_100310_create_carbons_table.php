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
        Schema::create('carbons', function (Blueprint $table) {
            $table->id();
            $table->double('ca_ar')->nullable();
            $table->double('ca_adb')->nullable();
            $table->double('ca_db')->nullable();
            $table->double('ca_daf')->nullable();
            $table->string('ca_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carbons');
    }
};
