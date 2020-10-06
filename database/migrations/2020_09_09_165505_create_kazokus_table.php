<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKazokusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kazokus', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->integer('user_id');

            $table->longtext('photo')->nullable();
            $table->string('family_name')->nullable();
            $table->date('family_date')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('kazokus');
    }
}
