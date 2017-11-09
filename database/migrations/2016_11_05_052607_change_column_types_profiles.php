<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnTypesProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('birth')->nullable()->change();
            $table->string('sex')->nullable()->change();
            $table->string('tell')->nullable()->change();
            $table->string('fax')->nullable()->change();
            $table->string('website')->nullable()->change();
            $table->string('contact_email')->nullable()->change();
            $table->text('about')->nullable()->change();
            $table->text('specification')->nullable()->change();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            //
        });
    }
}
