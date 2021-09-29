<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('servicenumber')->nullable();
            $table->date('dob')->nullable();
            $table->string('typeofemployment')->nullable();
            $table->integer('industry')->nullable();
            $table->string('employer')->nullable();
            $table->integer('county')->nullable();
            $table->integer('subcounty')->nullable();
            $table->integer('location')->nullable();
            $table->integer('sublocation')->nullable();
            $table->string('town',150)->nullable();
            $table->date('startdate')->nullable();
            $table->date('enddate')->nullable();
            $table->string('gender')->nullable();
            $table->string('Profile_Status')->nullable();
            $table->string('Current_Stage')->nullable();
           
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
        Schema::dropIfExists('profiles');
    }
}
