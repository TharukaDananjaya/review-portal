<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            "name" => "Super Admin",
            "email" => "superadmin@gmail.com",
            "password" => Hash::make('123456'),
            "type" => 1,
            "status" => 1
        ]);
        // $faker = Faker::create();

        // // Generate and insert 100 records
        // for ($i = 0; $i < 100; $i++) {
        //     DB::table('nids')->insert([
        //         'name' => $faker->name,
        //         'nid' => $faker->regexify('A[0-9]{6}'), // Example format: A000000
        //     ]);
        // }
    }
}
