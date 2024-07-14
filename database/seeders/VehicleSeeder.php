<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehicles')->delete();

        $types = ['bus', 'matatu', 'motorcycle'];
        $colors = ['Red', 'Blue', 'Green', 'Black', 'White'];

        for ($i = 0; $i < 5; $i++) {
            Vehicle::create([
                'sacco_id' => mt_rand(1, 5),
                'number_plate' => Str::upper(Str::random(3)).'-'.mt_rand(100, 999),
                'type' => $types[array_rand($types)],
                'color' => $colors[array_rand($colors)],
            ]);
        }
    }
}
