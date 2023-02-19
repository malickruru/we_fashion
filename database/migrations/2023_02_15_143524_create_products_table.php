<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // * créer la table products
        // cette table stockera les produits 
        // champ :
        // id = clé primaire
        // name = nom du produit , entre 5 et 100 caractère
        // description = la description du produit
        // price = le prix	prix en euros, possibilités de centimes
        // image = url de l'image
        // isVisible = Deux possibilités : true pour publié et false pour non publié
        // isDiscount = Deux possibilités : true pour en solde et false pour standard
        // reference = Deux possibilités : true pour publié et false pour non publié
        // category_id = clé étrangère lié à la clé primaire de la table categories

    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->min(5);
            $table->text('description');
            $table->double('price');
            $table->string('image');
            $table->boolean('isVisible');
            $table->boolean('isDiscount');
            $table->string('reference')->unique();
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
