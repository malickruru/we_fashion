<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // créer des tailles 
        $sizes = [
            [
                "name" => "XS",
            ],
            [
                "name" => "S",
            ],
            [
                "name" => "M",
            ],
            [
                "name" => "L",
            ],
            [
                "name" => "XL",
            ],
        ];
        // les ajouter dans la base de donnée
        foreach ($sizes as $size) {
            Size::create($size);
        }
    }
}
