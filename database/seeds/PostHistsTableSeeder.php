<?php
use Illuminate\Database\Seeder;

    class PostHistsTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            //Cmd: php artisan db:seed --class="PostHistsTableSeeder"
            
            $faker = Faker\Factory::create("ja_JP");
            
            for( $i=0; $i<10; $i++ ){

                App\PostHist::create([
					"post_id" => $faker->randomDigit(),
					"rev_id" => $faker->randomDigit(),
					"title" => $faker->word(),
					"body" => $faker->word(),
					"photo" => $faker->word(),
					"created_at" => $faker->dateTime("now"),
					"updated_at" => $faker->dateTime("now")
                ]);
            }
        }
    }