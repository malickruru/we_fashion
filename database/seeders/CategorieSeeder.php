<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // créer des categorie 
        $categories = [
            [
                "name" => "homme",
            ],
            [
                "name" => "femme",
            ]
        ];
        // les ajouter dans la base de donnée
        foreach ($categories as $categorie) {
            Categorie::create($categorie);
        }
    }
}
