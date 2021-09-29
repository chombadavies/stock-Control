<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('smsDescription')->nullable();
            $table->string('Recipient')->nullable();
            $table->string('MessageID')->nullable();
            $table->double('MessageCost')->nullable();
            $table->string('credit_balance')->nullable();
            $table->string('sentStatus')->nullable();
            $table->datetime('sentDate')->nullable();

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
        Schema::dropIfExists('messages');
    }
}
