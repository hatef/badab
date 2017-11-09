<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {

            $table->increments("id");
            $table->string('userid');
            $table->string("birth");
            $table->string("sex");
            $table->string("tell");
            $table->string("fax");
            $table->string("website");
            $table->string("contact_email");
            $table->text("about");
            $table->text("specification");
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
        //
    }
}
