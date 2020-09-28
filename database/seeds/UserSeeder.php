<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $faker = Faker::create("zh-TW");

        User::create([
        	'user_account' => '654321',
        	'user_pw' => Hash::make('654321'),
        	'created_at' => $faker->dateTime(),
        	'updated_at' => $faker->dateTime(),
        ]);

        for ($i = 1; $i <21 ; $i++) {
        	User::create([
        	'user_account' => $faker->userName,
        	'user_pw' => Hash::make($faker->password),
        	'created_at' => $faker->dateTime(),
        	'updated_at' => $faker->dateTime(),
        	]);
        }
    }
}
