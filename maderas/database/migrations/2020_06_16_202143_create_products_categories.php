<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_categories', function (Blueprint $table) {
            $table->bigIncrements('PK_products_categories');
            $table->string('name',255);
            $table->unsignedBigInteger('id_subcategories')->unsigned();
            $table->string('image',500)->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('id_subcategories')->references('PK_subcategories')->on('subcategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_categories');
    }
}
