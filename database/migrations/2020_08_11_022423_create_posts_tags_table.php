<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;
            
            class CreatePostsTagsTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("posts_tags", function (Blueprint $table) {
						$table->bigIncrements('id')->unsigned();
						$table->integer('post_id')->unsigned();
						$table->integer('tag_id')->unsigned();
						$table->timestamps();
						$table->softDeletes();
						//$table->foreign("id")->references("id")->on("posts");
						//$table->foreign("tag_id")->references("id")->on("tags");



						// ----------------------------------------------------
						// -- SELECT [posts_tags]--
						// ----------------------------------------------------
						// $query = DB::table("posts_tags")
						// ->leftJoin("posts","posts.id", "=", "posts_tags.id")
						// ->leftJoin("tags","tags.id", "=", "posts_tags.tag_id")
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
                    Schema::dropIfExists("posts_tags");
                }
            }
        