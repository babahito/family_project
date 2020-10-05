<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kposts', function (Blueprint $table) {

                $table->bigIncrements('id');
                $table->unsignedBigInteger('kazoku_id');
                $table->foreign('kazoku_id')
                    ->references('id')
                    ->on('kazokus')
                    ->onDelete('cascade');
                $table->unsignedBigInteger('kazokupost_id');
                $table->foreign('kazokupost_id')
                    ->references('id')
                    ->on('kazokuposts')
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
        Schema::dropIfExists('kposts');
    }
}
