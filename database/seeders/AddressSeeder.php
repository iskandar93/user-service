<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('addresses')->insert([
            [
                'id' => 1,
                'addressable_type' => 'App\\Models\\User',
                'addressable_id' => 1,
                'line_1' => 'No 15',
                'line_2' => 'Kampung Bandar Baru',
                'postcode' => 13200,
                'city' => 'Kg. Baru',
                'state_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'addressable_type' => 'App\\Models\\User',
                'addressable_id' => 2,
                'line_1' => 'Lot 23911',
                'line_2' => 'Bandar Baru Bangi',
                'postcode' => 54100,
                'city' => 'Bangi',
                'state_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'addressable_type' => 'App\\Models\\Farm',
                'addressable_id' => 3,
                'line_1' => 'No 1923, Taman Cempaka',
                'line_2' => 'Banting Baru',
                'postcode' => 43700,
                'city' => 'Banting',
                'state_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
