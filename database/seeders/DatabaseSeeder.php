<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // appeller les differents seeders
        $this->call(SizeSeeder::class);
        $this->call(CategorieSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(PivotProductSizeSeeder::class);
        $this->call(UserSeeder::class);
    }
}
