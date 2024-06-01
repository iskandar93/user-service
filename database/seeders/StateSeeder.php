<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('states')->insert([
            ['code' => 'JOH', 'name' => 'JOHOR'],
            ['code' => 'KED', 'name' => 'KEDAH'],
            ['code' => 'KEL', 'name' => 'KELANTAN'],
            ['code' => 'MLK', 'name' => 'MELAKA'],
            ['code' => 'NSN', 'name' => 'NEGERI SEMBILAN'],
            ['code' => 'PAH', 'name' => 'PAHANG'],
            ['code' => 'PEN', 'name' => 'PULAU PINANG'],
            ['code' => 'PRK', 'name' => 'PERAK'],
            ['code' => 'PER', 'name' => 'PERLIS'],
            ['code' => 'SEL', 'name' => 'SELANGOR'],
            ['code' => 'TER', 'name' => 'TERENGGANU'],
            ['code' => 'SBH', 'name' => 'SABAH'],
            ['code' => 'SWK', 'name' => 'SARAWAK'],
            ['code' => 'KUL', 'name' => 'WP KUALA LUMPUR'],
            ['code' => 'LBU', 'name' => 'WP LABUAN'],
            ['code' => 'PTJ', 'name' => 'WP PUTRAJAYA']
        ]);
    }
}
