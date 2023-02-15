<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        // * créer la table categories
        // cette table stockera les catégories de produits 
        // (hommes,femmes d'autre catégorie seront ajoutable par la suite)
        // champ :
        // id = clé primaire
        // name = nom de la catégorie


        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
