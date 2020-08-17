<?php
use Illuminate\Database\Seeder;

    class MailReceivedsTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            //Cmd: php artisan db:seed --class="MailReceivedsTableSeeder"
            
            $faker = Faker\Factory::create("ja_JP");
            
            for( $i=0; $i<10; $i++ ){

                App\MailReceived::create([
					"user_id" => $faker->randomDigit(),
					"received_user_id" => $faker->randomDigit(),
					"post_id" => $faker->randomDigit(),
					"received_day" => $faker->date()." ".$faker->time(),
					"received_life" => $faker->randomDigit(),
					"created_at" => $faker->dateTime("now"),
					"updated_at" => $faker->dateTime("now")
                ]);
            }
        }
    }