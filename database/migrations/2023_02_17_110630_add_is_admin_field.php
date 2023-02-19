<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    // ajout du champ isAdmin ,
    // c'est un booléen qui renvois true si l'utilisateur est un administrateur
    // ce champs prend la valeur false par défaut
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('isAdmin')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
