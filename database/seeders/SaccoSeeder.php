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

        for ($i = 0; $i < 5; $i++) {
            Sacco::create([
                'name' => Str::random(10),
                'registration_number' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'phone' => '07'.mt_rand(10000000, 99999999),
                'address' => Str::random(20),
                'logo' => Str::random(10).'.jpg',
                'password' => 'password',
            ]);
        }
    }
}
