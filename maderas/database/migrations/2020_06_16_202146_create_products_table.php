<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('PK_products');
            $table->string('SKU',50);
            $table->unsignedBigInteger('id_subcategory')->unsigned();
            $table->string('name',50);
            $table->string('description',5000)->nullable();
            $table->decimal('price',16, 2);
            $table->unsignedTinyInteger('avaible')->default(1);
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('id_subcategory')->references('PK_subcategories')->on('subcategories')->unsigned();
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
