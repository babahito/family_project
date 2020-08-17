<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;
            
            class CreateUserDetailsTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("user_details", function (Blueprint $table) {
						$table->bigIncrements('id')->unsigned();
						$table->integer('user_id')->unsigned();
						$table->string('photo')->nullable();
						$table->date('birthday')->nullable();
						$table->timestamps();
						$table->softDeletes();
						//$table->foreign("user_id")->references("id")->on("users");



						// ----------------------------------------------------
						// -- SELECT [user_details]--
						// ----------------------------------------------------
						// $query = DB::table("user_details")
						// ->leftJoin("users","users.id", "=", "user_details.user_id")
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
                    Schema::dropIfExists("user_details");
                }
            }
        