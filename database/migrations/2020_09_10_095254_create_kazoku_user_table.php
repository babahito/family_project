<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKazokuUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kazoku_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kazoku_id');
                $table->foreign('kazoku_id')
                    ->references('id')
                    ->on('kazokus')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kazoku_user');
    }
}
