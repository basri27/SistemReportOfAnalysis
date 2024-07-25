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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('principal');
            $table->string('address');
            $table->string('attention');
            $table->string('reff_order');
            $table->string('consignment');
            $table->double('weight');
            $table->date('date_recieve');
            $table->date('date_reported');
            $table->string('page');
            $table->foreignId('analisa_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};