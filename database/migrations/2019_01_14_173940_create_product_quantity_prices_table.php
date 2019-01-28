<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductQuantityPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_quantity_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_configuration_id');
            $table->foreign('product_configuration_id')->references('id')->on('product_configurations');
            $table->integer('quantity');
            $table->decimal('price_per_piece', 10, 2);
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
        Schema::dropIfExists('product_quantity_prices');
    }
}
