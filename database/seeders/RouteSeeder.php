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
                'name' => 'Route 521',
                'start_point' => 'Location A',
                'end_point' => 'Location B',
                'waypoints' => json_encode(['Location C', 'Location D']),
            ],
            [
                'name' => 'Route 2',
                'start_point' => 'Location E',
                'end_point' => 'Location F',
                'waypoints' => json_encode(['Location G', 'Location H']),
            ],
            [
                'name' => 'Route 3',
                'start_point' => 'Location I',
                'end_point' => 'Location J',
                'waypoints' => json_encode(['Location K', 'Location L']),
            ],
        ]);
    }
}