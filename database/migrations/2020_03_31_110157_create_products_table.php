<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->Integer('cat_id');
            $table->Integer('Brand_id');
            $table->float('product_price',10,2);
            $table->text('short_description');
            $table->text('long_description');
            $table->string('product_size');
            $table->tinyInteger('Product_qty');
            $table->text('main_image');
            $table->text('imagefile');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('products');
    }
}
