<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;
            
            class CreateMailReceivedsTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("mail_receiveds", function (Blueprint $table) {
						$table->increments('id')->unsigned();
						$table->integer('user_id')->unsigned();
						$table->integer('received_user_id')->unsigned();
						$table->integer('post_id')->unsigned();
						$table->date('received_day');
						$table->integer('received_life');
						$table->timestamps();
						$table->softDeletes();
						//$table->foreign("user_id")->references("id")->on("users");
						//$table->foreign("post_id")->references("id")->on("posts");



						// ----------------------------------------------------
						// -- SELECT [mail_receiveds]--
						// ----------------------------------------------------
						// $query = DB::table("mail_receiveds")
						// ->leftJoin("users","users.id", "=", "mail_receiveds.user_id")
						// ->leftJoin("posts","posts.id", "=", "mail_receiveds.post_id")
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
                    Schema::dropIfExists("mail_receiveds");
                }
            }
        