<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;
            
            class CreateAttributesTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("attributes", function (Blueprint $table) {
						$table->bigIncrements('id')->unsigned();
						$table->integer('user_id')->nullable()->unsigned();
						$table->string('attribute_name')->nullable();
						$table->timestamps();
						$table->softDeletes();
						

                    //*********************************
                    // Foreign KEY [ Uncomment if you want to use!! ]
                    //*********************************
                        //$table->foreign("user_id")->references("id")->on("users");



						// ----------------------------------------------------
						// -- SELECT [attributes]--
						// ----------------------------------------------------
						// $query = DB::table("attributes")
						// ->leftJoin("users","users.id", "=", "attributes.user_id")
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
                    Schema::dropIfExists("attributes");
                }
            }
        