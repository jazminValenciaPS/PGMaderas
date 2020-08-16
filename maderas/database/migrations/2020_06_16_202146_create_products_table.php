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
            $table->string('SKU',50)->unique();
            $table->unsignedBigInteger('id_products_categories')->unsigned();
            $table->string('name',50);
            $table->string('description',5000)->nullable();
            $table->decimal('price',16, 2);
            // $table->unsignedTinyInteger('avaible')->default(1);
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('id_products_categories')->references('PK_products_categories')->on('products_categories')->onDelete('cascade');
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
