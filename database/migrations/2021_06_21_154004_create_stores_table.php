<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->boolean('approve')->default(false)->nullubale();
            $table->boolean('issue')->default(false)->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('item_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->string('itemdescription')->nullable();
            $table->integer('quantity')->nullable();
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
        Schema::dropIfExists('stores');
    }
}
