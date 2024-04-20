<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        $user = [
            [
                'name' => 'Trần Thanh Vinh',
                'img' => $faker->imageUrl,
                'phone' => $faker->phoneNumber,
                'email' => 'viin242dev@gmail.com',
                'role' => 'admin',
                'active_status' => true,
                'last_accessed_at' => null,
                'status' => 'active',
                'email_verified_at' => null,
                'password' => bcrypt('123'),
                'remember_token' => null,
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ],
        ];

        DB::table('users')->insert($user);
        User::factory(20)->create();
    }
}
