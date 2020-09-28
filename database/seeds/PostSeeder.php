<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        $faker = Faker::create("zh-TW");
        $class = ["系統","生活","美食"];

        for ($i = 1; $i <101 ; $i++) {
        	Post::create([
        	'post_name' => $faker->userName,
        	'post_class' => $class[rand(0,2)],
        	'post_content' => $faker->realText($maxNbChars = 100),
        	'created_at' => $faker->dateTime(),
        	'updated_at' => $faker->dateTime(),
        	]);
        }
    }
}
