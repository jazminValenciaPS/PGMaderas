<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_details', function (Blueprint $table) {
            $table->bigIncrements('PK_orders_details');
            $table->unsignedBigInteger('id_product')->unsigned();
            $table->unsignedBigInteger('id_order')->unsigned();
            $table->unsignedBigInteger('quantity');
            $table->decimal('subtotal',16, 8);
            $table->string('comments',5000)->nullable();
            $table->unsignedTinyInteger('status')->default(1);

            $table->foreign('id_product')->references('PK_products')->on('products')->onDelete('cascade');
            $table->foreign('id_order')->references('PK_orders')->on('orders')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_details');
    }
}
