<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;
            
            class CreatePostHistsTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("post_hists", function (Blueprint $table) {
						$table->bigIncrements('id')->unsigned();
						$table->integer('post_id')->unsigned();
						$table->integer('rev_id')->unsigned();
						$table->string('title');
						$table->text('body');
						$table->string('photo')->nullable();
						$table->timestamps();
						$table->softDeletes();
						//$table->foreign("post_id")->references("id")->on("posts");



						// ----------------------------------------------------
						// -- SELECT [post_hists]--
						// ----------------------------------------------------
						// $query = DB::table("post_hists")
						// ->leftJoin("posts","posts.id", "=", "post_hists.post_id")
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
                    Schema::dropIfExists("post_hists");
                }
            }
        