<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "first_name" => "Super",
            "last_name" => "Admin",
            "address" => fake()->address(),
            "email" => "superadmin@boquentflower.com",
            "password" => Hash::make("Admin@123"),
        ]);
    }
}
