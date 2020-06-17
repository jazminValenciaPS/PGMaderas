<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->bigIncrements('PK_shipments');
            $table->unsignedBigInteger('id_type')->unsigned();
            $table->unsignedBigInteger('id_address')->unsigned();
            $table->date('shipping_date');
            $table->time('shipping_time');
            $table->decimal('subtotal',16, 8);
            $table->unsignedBigInteger('status')->unsigned();
            // $table->timestamps();

            $table->foreign('id_type')->references('PK_shipment_type')->on('shipment_type')->onDelete('cascade');
            $table->foreign('id_address')->references('PK_addresses')->on('addresses')->onDelete('cascade');
            $table->foreign('status')->references('PK_shipment_status')->on('shipment_status')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipments');
    }
}
