<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('supplierName');
            $table->string('supplierPin');
            $table->integer('telephoneNumber');
            $table->string('orderNumber');
            $table->string('deliveryNoteNumber');
            $table->string('invoiceNumber');
            $table->string('delevererName');
            $table->string('delevererPhone');
            $table->date('deleveryDate');
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
        Schema::dropIfExists('purchases');
    }
}
