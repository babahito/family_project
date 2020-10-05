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
            //
            // $table->integer('kazokupost_id')->unsigned();
            $table->integer('kazokupost_name')->unsigned();
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
            $table->dropColumn('kazokupost_name');
        });
    }
}
