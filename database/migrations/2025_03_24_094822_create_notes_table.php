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
        Schema::create('liste', function (Blueprint $table) {
            $table->id();  // ID auto-incrémenté
            $table->text('content');  // Contenu de la note
            $table->boolean('etat')->nullable();
            $table->timestamps();  // Les champs created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liste');
    }
};
