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

        $descriptions = [
            'A leading provider of matatu services in Nairobi, offering safe and reliable transportation.',
            'Dedicated to excellence in transportation, connecting rural areas with the city.',
            'Innovative transport solutions for the modern commuter, with a focus on sustainability.',
            'Your trusted partner in public transportation, serving thousands daily.',
            'Offering luxurious and comfortable travel options at affordable prices.'
        ];

        for ($i = 0; $i < 5; $i++) {
            Sacco::create([
                'name' => 'Sacco ' . Str::random(5),
                'registration_number' => strtoupper(Str::random(6)),
                'email' => Str::random(5).'@gmail.com',
                'phone' => '07'.mt_rand(10000000, 99999999),
                'address' => 'P.O Box '.mt_rand(100, 999).' Nairobi',
                'logo' => Str::random(5).'.jpg',
                'password' => bcrypt('password'),
                'description' => $descriptions[array_rand($descriptions)], // Select a random description
            ]);
        }
    }
}