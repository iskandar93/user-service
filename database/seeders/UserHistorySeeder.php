<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_histories')->insert([
            ['user_id' => 1, 'track_id' => 'track001', 'track_name' => 'Mountain High', 'track_artist' => 'Artist I', 'played_at' => now()],
            ['user_id' => 1, 'track_id' => 'track002', 'track_name' => 'Shape of You', 'track_artist' => 'Ed Sheeran', 'played_at' => now()],
            ['user_id' => 2, 'track_id' => 'track009', 'track_name' => 'Bohemian Rhapsody', 'track_artist' => 'Queen', 'played_at' => now()],
            ['user_id' => 2, 'track_id' => 'track020', 'track_name' => 'Baby oh Baby', 'track_artist' => 'Justin Bieber', 'played_at' => now()],
            ['user_id' => 2, 'track_id' => 'track007', 'track_name' => 'Taking to the Moon', 'track_artist' => 'Bruno Mars', 'played_at' => now()],
            ['user_id' => 3, 'track_id' => 'track030', 'track_name' => 'Made You Look', 'track_artist' => 'Meghan Trainor', 'played_at' => now()],
        ]);
    }
}
