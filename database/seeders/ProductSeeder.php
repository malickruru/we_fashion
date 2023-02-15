<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Product;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    // générer une référence unique 
    // cette fonction génére une chaine de 16 caractère
    // elle reprend le processus si la référence généré existe déjà dans la table product .
    // pour éviter de rentrer dans une boucle infini, on crée une variable $limit qui empêche 
    // la fonction de s'auto-appelé après 100 tentative 
    public function createReference($limit = 100,Faker $faker)
    {
        $ref = $faker->numerify('product-########');
        if (Product::where('reference', $ref)->exists()) {
            if ($limit <= 0) {
                throw new Exception('Incapable de générer une référence unique.');
            }
            return $this->createReference($limit - 1,$faker);
        }
        return $ref;
    }

    public function run(Faker $faker): void 
    {

        // créer une boucle qui va générer 80 produits
        for ($i = 0; $i < 80; $i++) {

            // générer une categorie aleatoire
            $categorie = Categorie::all()->random();

            DB::table('products')->insert([
                'name' => $faker->word(), //génere un mot
                'description' => $faker->text(), //génere un text de 200 caractère
                'price' => $faker->randomFloat(2), //génere un nombre décimal 
                'isVisible' => $faker->randomElement([true, false]), //génere un booleen
                'isDiscount' => $faker->randomElement([true, false]), //génere un booleen
                'reference' => $this->createReference(100,$faker), //génere une référence
                'category_id' => $categorie->id, //récupère l'id de la categorie généré plus tôt
                'image' => "image/" . $categorie->name . "-" . $faker->numberBetween(1, 10) . ".jpg", // génere un nom de fichier composé du nom de la categorie suivit d'un id
                // insertion des timestamp à l'aide de la classe Carbon
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
