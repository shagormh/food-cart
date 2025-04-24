<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        $users = [
            [
                "id" => 1,
                "name" => "Shagor",
                "mobile" => 01700000000,
                "email" => "admin@gmail.com",
                "user_type" => "admin",
                "email_verified_at" => now(),
                "password" => Hash::make("11001100"), // Hashing the password
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 2,
                "name" => "ABC",
                "mobile" => '01712345678',
                "email" => "abc@gmail.com",
                "user_type" => "user",
                "email_verified_at" => now(),
                "password" => Hash::make("12345678"), // Hashing the password
                "created_at" => now(),
                "updated_at" => now()
            ]
        ];

        DB::table('users')->insert($users);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
