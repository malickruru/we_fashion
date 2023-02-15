<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // * créer la table sizes
        // cette table stockera les tailles de produits 
        // (XS, S, M, L, XL)
        // champ :
        // id = clé primaire
        // name = nom de la tailles
    public function up(): void
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('sizes');
    }
};
