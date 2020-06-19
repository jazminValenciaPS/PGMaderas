<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('PK_orders');
            $table->unsignedBigInteger('id_user')->unsigned();
            $table->unsignedBigInteger('id_shipment')->unsigned();
            $table->date('date');
            $table->time('time');
            $table->decimal('total',16, 8);
            $table->unsignedBigInteger('id_payment')->unsigned();
            $table->unsignedBigInteger('status')->unsigned();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_shipment')->references('PK_shipments')->on('shipments')->onDelete('cascade');
            $table->foreign('id_payment')->references('PK_payment_type')->on('payment_type')->onDelete('cascade');
            $table->foreign('status')->references('PK_order_status')->on('order_status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
