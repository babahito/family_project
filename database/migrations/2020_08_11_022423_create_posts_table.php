<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;
            
            class CreatePostsTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("posts", function (Blueprint $table) {
						$table->bigIncrements('id')->unsigned();
						$table->string('title');
						$table->text('body');
						$table->integer('user_id')->unsigned();
						$table->longtext('photo')->nullable();
						$table->integer('attribute_id')->nullable()->unsigned();
						$table->integer('status');
						$table->date('sendtime');
						$table->timestamps();
						$table->softDeletes();
						//$table->foreign("user_id")->references("id")->on("users");
						//$table->foreign("attribute_id")->references("id")->on("attributes");



						// ----------------------------------------------------
						// -- SELECT [posts]--
						// ----------------------------------------------------
						// $query = DB::table("posts")
						// ->leftJoin("users","users.id", "=", "posts.user_id")
						// ->leftJoin("attributes","attributes.id", "=", "posts.attribute_id")
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
                    Schema::dropIfExists("posts");
                }
            }
        