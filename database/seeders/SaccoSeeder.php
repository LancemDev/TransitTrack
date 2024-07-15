<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Sacco;

class SaccoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('saccos')->delete();

        $saccoNames = [
            'Mwamba Sacco',
            'Rift Valley Shuttle',
            'Nairobi Matatu Sacco',
            'Coast Bus Sacco',
            'Western Express Sacco'
        ];

        $descriptions = [
            'A leading provider of matatu services in Nairobi, offering safe and reliable transportation.',
            'Dedicated to excellence in transportation, connecting rural areas with the city.',
            'Innovative transport solutions for the modern commuter, with a focus on sustainability.',
            'Your trusted partner in public transportation, serving thousands daily.',
            'Offering luxurious and comfortable travel options at affordable prices.'
        ];

        foreach ($saccoNames as $index => $name) {
            Sacco::create([
                'name' => $name,
                'registration_number' => 'SACCO-' . strtoupper(Str::random(4)) . '-' . sprintf('%03d', $index + 1),
                'email' => strtolower(Str::slug($name, '')) . '@gmail.com',
                'phone' => '07' . mt_rand(10000000, 99999999),
                'address' => 'P.O Box ' . mt_rand(100, 999) . ' Nairobi',
                'logo' => strtolower(Str::slug($name, '')) . '.jpg',
                'password' => bcrypt('password'),
                'description' => $descriptions[$index % count($descriptions)], // Cycle through descriptions
            ]);
        }
    }
}