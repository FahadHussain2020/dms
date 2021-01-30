<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderitems', function (Blueprint $table) {
            $table->bigIncrements('pno');
             $table->biginteger('ordid')->unsigned();
             //making a foreign key in orders table
            $table->foreign('ordid')->references('ordid')->on('orders')->onDelete('cascade');
            $table->biginteger('pid');
            $table->string('pname');
            $table->double('rprice');
            $table->double('ordqty');
            $table->double('discount');
            $table->double('amount');
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
        Schema::dropIfExists('orderitems');
    }
}
