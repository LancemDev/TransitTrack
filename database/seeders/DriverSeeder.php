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

        $names = ['John Doe', 'Jane Smith', 'Michael Brown', 'Emily Johnson', 'David Wilson'];
        $domains = ['example.com', 'mail.com', 'driver.net', 'transport.org'];

        for ($i = 0; $i < 5; $i++) {
            $nameParts = explode(' ', $names[$i]);
            $email = strtolower($nameParts[0]) . '.' . strtolower($nameParts[1]) . '@' . $domains[array_rand($domains)];

            Driver::create([
                'name' => $names[$i],
                'email' => $email,
                'phone' => '07'.mt_rand(10000000, 99999999),
                'password' => bcrypt('password'),
                'last_login' => Carbon::now(),
                'last_logout' => Carbon::now(),
                'sacco_id' => $i + 1, // Assign sacco_id from 1 to 5
            ]);
        }

        // Adding a specific driver with known details and sacco_id
        Driver::create([
            'name' => 'Driver Doe',
            'email' => 'driver@example.com',
            'phone' => '0712345678',
            'sacco_id' => 1, // Assign a specific sacco_id if needed
            'password' => bcrypt('password'),
            'last_login' => Carbon::now(),
            'last_logout' => Carbon::now(),
        ]);
    }
}