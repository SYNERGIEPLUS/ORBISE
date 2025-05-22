<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commande', function (Blueprint $table) {
            //
            $table->id();
            $table->unsignedBigInteger('id_client')->nullable();
            $table->unsignedBigInteger('id_type')->nullable();
            $table->Date('DateCommande')->nullable();
            $table->Date('DateLivraison')->nullable();
            $table->enum('NatureCarte', ['Physique', 'Numerique'])->nullable();
            $table->String('ServiceCommande')->nullable();
            $table->String('PaysCommande')->nullable();
            $table->String('VilleCommande')->nullable();
            $table->enum('Etat', ['0', '1', '2', '3'])->nullable();
            $table->String('Mail')->nullable();
            $table->String('TypeCartes')->nullable();
            $table->String('Telephone')->nullable();
            $table->Integer('Quantite')->nullable();
            $table->unsignedBigInteger('user')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande');
    }
};
