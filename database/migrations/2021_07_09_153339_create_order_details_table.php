<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orderId');
            $table->integer('category_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->foreignId('item_id');
            $table->integer('quantity');
            $table->foreignId('units');
            $table->string('itemdescription')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('centre_id');
            $table->boolean('status');
             $table->boolean('approve')->default(false)->nullubale();
             $table->boolean('reject')->default(false)->nullubale();
             $table->boolean('issue')->default(false)->nullable();
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
        Schema::dropIfExists('order_details');
    }
}
