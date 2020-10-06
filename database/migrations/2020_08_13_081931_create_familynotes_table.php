<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilynotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familynotes', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->integer('user_id')->nullable()->unsigned();
            $table->longtext('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
            //$table->foreign("user_id")->references("id")->on("users");



            // ----------------------------------------------------
            // -- SELECT [posts]--
            // ----------------------------------------------------
            // $query = DB::table("posts")
            // ->leftJoin("users","users.id", "=", "posts.user_id")
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
        Schema::dropIfExists('familynotes');
    }
}
