<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('routes')->insert([
            [
                'name' => 'Nairobi-Kiserian',
                'start_point' => 'Kiserian',
                'end_point' => 'Town',
                'waypoints' => json_encode(['Rongai', 'Nyayo']),
            ],
            [
                'name' => 'Town-Langata',
                'start_point' => 'Langata',
                'end_point' => 'Town',
                'waypoints' => json_encode(['Kibera', 'Nyayo']),
            ],
            [
                'name' => 'Ngumo-Town',
                'start_point' => 'Ngumo',
                'end_point' => 'TownJ',
                'waypoints' => json_encode(['Kenyatta', 'Nairobi-West']),
            ],
        ]);
    }
}