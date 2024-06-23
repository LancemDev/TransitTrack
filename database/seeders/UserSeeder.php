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
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'user@example.com',
            'phone' => '0712545678',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        for ($i = 1; $i <= 5; $i++) {
            DB::table('users')->insert([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'phone' => '071254567' . $i,
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        DB::table('sacco_admins')->insert([
            'name' => 'Jane Doe',
            'email' => 'sacco@example.com',
            'phone' => '0714345678',
            'sacco_id' => 3,
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('drivers')->insert([
            'name' => 'John Doe',
            'email' => 'driver@example.com',
            'phone' => '0712645678',
            'sacco_id' => 3,
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('admins')->insert([
            'name' => 'John Doe',
            'email' => 'admin@example.com',
            'phone' => '0712745678',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
