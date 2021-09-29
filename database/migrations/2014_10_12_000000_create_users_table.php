<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('org_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->string('role_id')->nullable();
            $table->string('verification_code')->unique()->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('token_2fa')->nullable();
            $table->datetime('token_2fa_expiry')->nullable();
            $table->enum('user_status',['Active',"Blocked"])->default("Active");
            $table->enum('user_type',['Internal','External'])->default("Internal");
            $table->string('password');
            $table->string('token')->unique()->nullable();
            $table->datetime('token_expiry')->nullable();
            $table->datetime('lastlogindate')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
