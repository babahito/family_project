<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;
            
            class CreateBookmarksTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("bookmarks", function (Blueprint $table) {
						$table->bigIncrements('id')->unsigned();
						$table->integer('user_id')->unsigned();
						$table->integer('post_id')->unsigned();
						$table->timestamps();
						$table->softDeletes();
						//$table->foreign("user_id")->references("id")->on("users");
						//$table->foreign("post_id")->references("id")->on("posts");



						// ----------------------------------------------------
						// -- SELECT [bookmarks]--
						// ----------------------------------------------------
						// $query = DB::table("bookmarks")
						// ->leftJoin("users","users.id", "=", "bookmarks.user_id")
						// ->leftJoin("posts","posts.id", "=", "bookmarks.post_id")
						// ->get();
						// dd($query); //For checking



                    });
                }
    
                /**
                 * Reverse the migrations.
                 *
                 * @return void
                 */
                public function down()
                {
                    Schema::dropIfExists("bookmarks");
                }
            }
        