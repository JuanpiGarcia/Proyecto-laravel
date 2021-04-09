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
            $table->id();
            $table->String('title');
            $table->String('description',500);
            // unsigned -> elimina los signos de "-" para que no sea negativo.
            $table->integer('pricee')->unsigned();
            $table->integer('stock')->unsigned();
            $table->String('status')->default('sin valor');
            //price
            //stock
            //status
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
