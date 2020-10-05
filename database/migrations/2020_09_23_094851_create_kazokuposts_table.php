<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKazokupostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kazokuposts', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('title');
            $table->text('body');
            $table->integer('user_id')->unsigned();
            $table->integer('kazokupost_id')->nullable()->unsigned();
            $table->text('photo')->nullable();
            $table->integer('attribute_id')->nullable()->unsigned();
            $table->integer('status')->nullable();
            $table->date('sendtime')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kazokuposts');
    }
}
