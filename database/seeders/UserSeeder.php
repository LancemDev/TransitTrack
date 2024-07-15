<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Replace 'John Doe' with a Kenyan common name and adjust the email accordingly
        DB::table('users')->insert([
            'name' => 'Wanjiru Kamau',
            'email' => 'wanjiru.kamau@example.com',
            'phone' => '0712545678',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Kenyan common names for additional users
        $kenyanNames = [
            'Amani Kiprono',
            'Fatuma Aluoch',
            'Makena Njeri',
            'Omari Mwangi',
            'Nia Mutiso'
        ];

        foreach ($kenyanNames as $i => $name) {
            $emailName = strtolower(str_replace(' ', '.', $name)); // Convert name to lowercase and replace space with dot for email
            DB::table('users')->insert([
                'name' => $name,
                'email' => $emailName . '@example.com',
                'phone' => '071254567' . ($i + 9), // Adjust phone numbers to be unique
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}