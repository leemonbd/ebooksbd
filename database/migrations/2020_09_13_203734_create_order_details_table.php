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
            $table->increments('id');
            $table->integer('customerId');
            $table->integer('orderNumber');
            $table->integer('bookId');
            $table->string('bookName');
            $table->string('authorName');
            $table->float('bookPrice',10,2);
            $table->integer('bookQuantity');
            $table->string('status')->default('Pending');
            $table->text('bookImage');
            $table->text('bookPdf');
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
