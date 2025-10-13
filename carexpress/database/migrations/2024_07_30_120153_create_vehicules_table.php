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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->string('matricule')->primary();
            $table->decimal('prixLocation', 10, 2);
            $table->year('anneeFabrication');
            $table->string('versionVehicule');
            $table->string('carburant');
            $table->boolean('disponibilite')->default(true);
            $table->string('imageVehicule');
            $table->foreignId('modele_id')->constrained('modeles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('categorie_id')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('transmission_id')->constrained('transmissions')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
