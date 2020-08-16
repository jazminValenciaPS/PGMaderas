<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->bigIncrements('PK_stock');
            $table->unsignedBigInteger('id_PG_branches')->unsigned();
            $table->unsignedBigInteger('id_product')->unsigned();
            $table->bigInteger('avaible')->default(1);
            $table->unsignedTinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('id_product')->references('PK_products')->on('products')->onDelete('cascade');
            $table->foreign('id_PG_branches')->references('PK_PG_branches')->on('_p_g_branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock');
    }
}
