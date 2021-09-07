<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_price_id');
            $table->integer('order_id');
            $table->integer('quantity');
            $table->date('buy_date');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_products');
    }
}
