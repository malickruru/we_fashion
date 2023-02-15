<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // * créer la table pivot_product_size
        // cette table stockera les relation entre produits et taille
        // cette table traduit une Many to many car un produit peut être lié à plusieurs tailles
        // et une taille peut être lié a plusieurs produits
        // champ :
        // id = clé primaire
        // product_id = clé étrangère lié à la clé primaire de la table products
        // size_id = clé étrangère lié à la clé primaire de la table sizes
    public function up(): void
    {
        Schema::create('pivot_product_size', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products');
            $table->foreignId('size_id')->references('id')->on('sizes');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('pivot_product_size');
    }
};
