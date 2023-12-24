<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seeder for user table
        $users = [
            [
                "name" => "admin",
                "email" => "admin@admin",
                "password" => Hash::make('admin'),
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "user",
                "email" => "user@user",
                "password" => Hash::make('user'),
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];

        User::insert($users);
    }
}
