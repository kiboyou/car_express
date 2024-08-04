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
        Schema::create('factures', function (Blueprint $table) {
            $table->string('numfacture')->primary();
            $table->integer('nombre_jour');
            $table->decimal('montant', 10,2);
            $table->decimal('taxes',10,2)->default(0.10);
            $table->decimal('montant_total',10,2);
            $table->string('reservation_id');
            $table->foreign('reservation_id')->references('numreservation')->on('reservations')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
