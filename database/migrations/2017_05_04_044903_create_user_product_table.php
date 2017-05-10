<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->string('product_name');
            $table->integer('user_id');
            $table->tinyInteger('qty');
            $table->integer('totalprice');
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
        Schema::dropIfExists('user_products');
    }
}
