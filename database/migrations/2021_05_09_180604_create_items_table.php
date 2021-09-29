<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('itemName')->unique();
            $table->string('itemCode')->unique();
            $table->string('itemSerialnumber')->unique()->nullable();
            $table->string('itemTagnumber')->unique()->nullable();
            $table->foreignId('category_id');
            $table->foreignId('product_id');
            $table->foreignId('created_by')->nullable();
            $table->foreignId('updated_by')->nullable();
            $table->foreignId('itemUnit');
            $table->string('itemImage');
            $table->string('itemDescription');
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
        Schema::dropIfExists('items');
    }
}
