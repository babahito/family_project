<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //********************************************
        // Cmd:[ php artisan db:seed ]
        //********************************************
        // $this->call(UsersTableSeeder::class);
		$this->call(UsersTableSeeder::class);
		$this->call(AttributesTableSeeder::class);
		$this->call(UserDetailsTableSeeder::class);
		$this->call(FollowsTableSeeder::class);
		$this->call(BookmarksTableSeeder::class);
		$this->call(PostsTableSeeder::class);
		$this->call(LikesTableSeeder::class);
		$this->call(PostsTagsTableSeeder::class);
		$this->call(TagsTableSeeder::class);
		$this->call(PostHistsTableSeeder::class);
		$this->call(MailSendsTableSeeder::class);
		$this->call(MailReceivedsTableSeeder::class);
   }
}