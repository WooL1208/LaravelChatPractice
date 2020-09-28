<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Reply;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reply::truncate();
        $faker = Faker::create("zh-TW");

        for ($i = 1; $i <501 ; $i++) {
        	Reply::create([
        	'post_id' => $faker->numberBetween($min = 1, $max = 100),
        	'reply_name' => $faker->userName,
        	'reply_content' => $faker->realText($maxNbChars = 100),
        	'created_at' => $faker->dateTime(),
        	'updated_at' => $faker->dateTime(),
        	]);
        }
    }
}
