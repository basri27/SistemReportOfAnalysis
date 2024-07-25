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
        Schema::create('isos', function (Blueprint $table) {
            $table->id();
            $table->double('sulfur')->nullable();
            $table->double('ash')->nullable();
            $table->string('method_sulfur')->nullable();
            $table->string('method_ash')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isos');
    }
};
