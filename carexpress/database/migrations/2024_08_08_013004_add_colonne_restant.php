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
        Schema::table('receiveds', function (Blueprint $table) {
            //
            $table->decimal('restant', 10, 2)->after('montant_verse');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receiveds', function (Blueprint $table) {
            //
            $table->dropColumn('restant');
        });
    }
};
