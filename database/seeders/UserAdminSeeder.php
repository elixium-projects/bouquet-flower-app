<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $names = [
            "admin",
            "user"
        ];

        foreach ($names as $name) {
            $roleCreated = Role::create([
                "name" => $name
            ]);

            if ($name === "admin") {
                User::create([
                    "role_id" => $roleCreated->id,
                    "first_name" => "Super",
                    "last_name" => "Admin",
                    "address" => fake()->address(),
                    "email" => "superadmin@boquentflower.com",
                    "password" => Hash::make("Admin@123"),
                ]);
            }

            if ($name === "user") {
                User::create([
                    "role_id" => $roleCreated->id,
                    "first_name" => "user",
                    "last_name" => "123",
                    "address" => fake()->address(),
                    "email" => "user@boquentflower.com",
                    "password" => Hash::make("user123"),
                ]);
            }
        }
    }
}
