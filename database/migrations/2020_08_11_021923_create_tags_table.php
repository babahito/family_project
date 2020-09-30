<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;
            
            class CreateTagsTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("tags", function (Blueprint $table) {
						$table->bigIncrements('id');
						$table->string('name');
						$table->timestamps();
						$table->softDeletes();



						// ----------------------------------------------------
						// -- SELECT [tags]--
						// ----------------------------------------------------
						// $query = DB::table("tags")
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
                    Schema::dropIfExists("tags");
                }
            }
        