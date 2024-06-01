<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserInterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_interests')->insert([
            ['user_id' => 1, 'name' => 'Music festivals'],
            ['user_id' => 1, 'name' => 'Guitar playing'],
            ['user_id' => 2, 'name' => 'Songwriting'],
            ['user_id' => 2, 'name' => 'Piano'],
            ['user_id' => 2, 'name' => 'Vinyl Collection'],
            ['user_id' => 3, 'name' => 'DJing'],
        ]);
    }
}
