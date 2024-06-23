<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaccoAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a new Sacco Admin
        $saccoAdmin = new \App\Models\SaccoAdmin();
        $saccoAdmin->name = 'Sacco Admin';
        $saccoAdmin->email = 'sacco-admin@example.com';
        $saccoAdmin->phone = '0712345678';
        $saccoAdmin->sacco_id = 1;
        $saccoAdmin->password = bcrypt('password');
        $saccoAdmin->save();
    }
}
