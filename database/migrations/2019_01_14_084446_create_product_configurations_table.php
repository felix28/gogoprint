<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->unsignedInteger('paper_format_id');
            $table->foreign('paper_format_id')->references('id')->on('paper_formats');
            $table->unsignedInteger('page_id');
            $table->foreign('page_id')->references('id')->on('pages');
            $table->unsignedInteger('paper_type_id');
            $table->foreign('paper_type_id')->references('id')->on('paper_types');
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
        Schema::dropIfExists('product_configurations');
    }
}
