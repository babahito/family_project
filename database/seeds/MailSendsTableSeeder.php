<?php
use Illuminate\Database\Seeder;

    class MailSendsTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            //Cmd: php artisan db:seed --class="MailSendsTableSeeder"
            
            $faker = Faker\Factory::create("ja_JP");
            
            for( $i=0; $i<10; $i++ ){

                App\MailSend::create([
					"user_id" => $faker->randomDigit(),
					"send_user_id" => $faker->randomDigit(),
					"post_id" => $faker->randomDigit(),
					"send_day" => $faker->date()." ".$faker->time(),
					"created_at" => $faker->dateTime("now"),
					"updated_at" => $faker->dateTime("now")
                ]);
            }
        }
    }