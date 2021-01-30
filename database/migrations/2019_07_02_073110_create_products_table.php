<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->double('pur_price');
            $table->double('ret_price');
            $table->integer('qty');
            $table->biginteger('category')->unsigned();
            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
            $table->biginteger('supplier')->unsigned();
            $table->foreign('supplier')->references('id')->on('suppliers')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
