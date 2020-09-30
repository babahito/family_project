<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;
            
            class CreateMailSendsTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("mail_sends", function (Blueprint $table) {
						$table->bigIncrements('id')->unsigned();
						$table->integer('user_id')->unsigned();
						$table->integer('send_user_id')->unsigned();
						$table->integer('post_id')->unsigned();
						$table->date('send_day');
						$table->timestamps();
						$table->softDeletes();
						//$table->foreign("user_id")->references("id")->on("users");
						//$table->foreign("post_id")->references("id")->on("posts");



						// ----------------------------------------------------
						// -- SELECT [mail_sends]--
						// ----------------------------------------------------
						// $query = DB::table("mail_sends")
						// ->leftJoin("users","users.id", "=", "mail_sends.user_id")
						// ->leftJoin("posts","posts.id", "=", "mail_sends.post_id")
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
                    Schema::dropIfExists("mail_sends");
                }
            }
        