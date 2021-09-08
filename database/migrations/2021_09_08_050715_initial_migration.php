<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitialMigration extends Migration
{

    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('genre_id');
            $table->integer('author_id');
            $table->string('title');
            $table->integer('cartPosition');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('author_id')->references('id')->on('authors');
        });

        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->float('price');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('price_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('price_id')->references('id')->on('prices');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->float('total_cost');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_price_id');
            $table->integer('order_id');
            $table->integer('quantity');
            $table->date('buy_date');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_price_id')->references('id')->on('product_prices');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }


    public function down()
    {
        Schema::dropIfExists('order_products');
        Schema::dropIfExists('product_prices');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('prices');
        Schema::dropIfExists('products');
        Schema::dropIfExists('users');
        Schema::dropIfExists('genres');
        Schema::dropIfExists('authors');
    }
}
