<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePGBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_p_g_branches', function (Blueprint $table) {
            $table->bigIncrements('PK_PG_branches');
            $table->string('number_branch',255);
            $table->string('state',255);
            $table->string('city',255);
            $table->string('suburb',255);
            $table->string('street',255);
            $table->string('number',255);
            $table->string('postal_code',255);
            $table->string('phone',255);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_p_g_branches');
    }
}
