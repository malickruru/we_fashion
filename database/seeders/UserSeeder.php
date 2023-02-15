<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // créé l'administrateur Edouard
        DB::table('users')->insert([
            'name' => 'Edouard',
            'email' => 'edouard@gmail.com',
            'password' => Hash::make('password'),//le mot de passe est password 
            // insertion des timestamp à l'aide de la classe Carbon
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
