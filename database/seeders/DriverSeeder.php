<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Driver;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('drivers')->delete();

        for ($i = 0; $i < 5; $i++) {
            Driver::create([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'phone' => '07'.mt_rand(10000000, 99999999),
                'password' => bcrypt('password'),
                'last_login' => Carbon::now(),
                'last_logout' => Carbon::now(),
            ]);
        }

        DB::table('drivers')->insert([
            [
                'name' => 'Driver Doe',
                'email' => 'driver@example.com',
                'phone' => '0712345678',
                'password' => bcrypt('password'),
                'last_login' => Carbon::now(),
                'last_logout' => Carbon::now(),
            ],
        ]);
    }
}
