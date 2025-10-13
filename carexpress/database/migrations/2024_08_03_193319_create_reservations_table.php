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
        Schema::create('reservations', function (Blueprint $table) {
            $table->string('numreservation')->primary();
            $table->date('debutlocation');
            $table->date('finlocation');
            $table->string('customer_id');
            $table->string('vehicule_id');
            $table->foreign('customer_id')->references('codeclient')->on('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vehicule_id')->references('matricule')->on('vehicules')->onDelete('cascade')->onUpdate('cascade');
            $table->string('paiement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
