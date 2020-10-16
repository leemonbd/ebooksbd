<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoryId');
            $table->integer('subcategoryId');
            $table->string('bookName');
            $table->string('authorName');
            $table->float('bookPrice',10,2);
            $table->integer('bookQuantity');
            $table->text('bookDescription');
            $table->text('bookImage');
            $table->text('bookPdf');
            $table->tinyInteger('publicationStatus');
            $table->integer('visits')->nullable();
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
        Schema::dropIfExists('books');
    }
}
