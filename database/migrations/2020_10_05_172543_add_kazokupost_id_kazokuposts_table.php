<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKazokupostIdKazokupostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kazokuposts', function (Blueprint $table) {
            //]
            

            $table->integer('kazokupost_id')->nullable()->unsigned();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kazokuposts', function (Blueprint $table) {
            //
            $table->dropColumn('kazokupost_id');
        });
    }
}
