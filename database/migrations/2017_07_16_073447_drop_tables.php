<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists("orders");
        Schema::dropIfExists("remplates");
        Schema::dropIfExists("requests");
        Schema::dropIfExists("premiums");
        Schema::dropIfExists("templates");
        Schema::dropIfExists("track_records");
        Schema::dropIfExists("verified");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
