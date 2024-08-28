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
        Schema::create('rent_details', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('rent_id');
            $table->string('tujuan');
            $table->enum('sppd',['ya','tidak'])->default('tidak');
            $table->enum('bbm',['ya','tidak'])->default('tidak');
            $table->enum('sppd_agreement',['diterima','ditolak','proses'])->default('proses');
            $table->enum('bbm_agreement',['diterima','ditolak','proses'])->default('proses');
            $table->foreign('rent_id')->references('id')->on('rents')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_details');
    }
};
