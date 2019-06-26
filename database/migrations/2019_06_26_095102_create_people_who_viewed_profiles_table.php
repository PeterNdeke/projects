<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleWhoViewedProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_who_viewed_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('viewed_profiles_id')->unsigned();
            $table->integer('viewed_by')->unsigned();
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
        Schema::dropIfExists('people_who_viewed_profiles');
    }
}
