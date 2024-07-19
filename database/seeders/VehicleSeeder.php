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

        // Adjusted vehicle types and colors for a Kenyan context
        $types = ['Matatu', 'Bus', 'Tuk Tuk', 'Boda Boda'];
        $colors = ['Red', 'Blue', 'Green', 'Yellow', 'White', 'Black'];

        for ($i = 0; $i < 10; $i++) { // Increase the number of vehicles seeded
            Vehicle::create([
                'sacco_id' => mt_rand(1, 5), // Assuming you have at least 5 saccos seeded
                // Adjusted number plate format to match Kenyan standards (e.g., KAA 001A)
                'number_plate' => 'K' . chr(mt_rand(65, 90)) . chr(mt_rand(65, 90)) . ' ' . mt_rand(100, 999) . chr(mt_rand(65, 90)),
                'type' => $types[array_rand($types)],
                'color' => $colors[array_rand($colors)],
            ]);
        }
    }
}