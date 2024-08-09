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
        Schema::create('receiveds', function (Blueprint $table) {
            $table->string('numreceived')->primary();
            $table->string('facture_id');
            $table->decimal('montant_verse',10,2);
            $table->foreign('facture_id')->references('numfacture')->on('factures')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receiveds');
    }
};
