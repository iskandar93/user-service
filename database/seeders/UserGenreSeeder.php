<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_genres')->insert([
            ['user_id' => 1, 'name' => 'Hip Hop'],
            ['user_id' => 1, 'name' => 'Jazz'],
            ['user_id' => 2, 'name' => 'Blues'],
            ['user_id' => 2, 'name' => 'Pop'],
            ['user_id' => 2, 'name' => 'Rock'],
            ['user_id' => 3, 'name' => 'Indie'],
        ]);
    }
}
