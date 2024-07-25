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
        Schema::create('analisas', function (Blueprint $table) {
            $table->id();
            $table->string('job_no');
            $table->string('kode');
            $table->string('lab_sample_id');
            $table->string('standard');
            $table->string('parameter');
            $table->string('kode_sampel');
            $table->string('client');
            $table->string('kode_seam')->nullable();
            $table->string('kontraktor')->nullable();
            $table->string('status');
            $table->double('adl_a')->nullable();
            $table->integer('tat')->nullable();
            $table->date('tgl_sampel');
            $table->foreignId('astm_id')->nullable();
            $table->foreignId('iso_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analisas');
    }
};
