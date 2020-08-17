<?php
use Illuminate\Database\Seeder;

    class PostsTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            //Cmd: php artisan db:seed --class="PostsTableSeeder"
            
            $faker = Faker\Factory::create("ja_JP");
            
            for( $i=0; $i<10; $i++ ){

                App\Post::create([
					"title" => $faker->word(),
					"body" => $faker->word(),
					"user_id" => $faker->randomDigit(),
					"photo" => $faker->word(),
					"attribute_id" => $faker->randomDigit(),
					"status" => $faker->randomDigit(),
					"created_at" => $faker->dateTime("now"),
					"updated_at" => $faker->dateTime("now")
                ]);
            }
        }
    }