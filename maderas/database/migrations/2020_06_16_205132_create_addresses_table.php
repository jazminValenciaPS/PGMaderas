<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('PK_addresses');
            $table->unsignedBigInteger('id_user')->unsigned();
            $table->string('street',255);
            $table->string('city',255);
            $table->string('state',255);
            $table->string('postal_code',20);
            $table->string('suburb',255);
            $table->string('reference',5000)->nullable();
            $table->unsignedTinyInteger('is_default')->default(0);
            $table->unsignedTinyInteger('status')->default(1);

            $table->foreign('idCate')->references('idCategoria')->on('categorias');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('addresses');
    }
}
