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

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('author_id')->references('id')->on('authors');
        });

        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->float('price');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on('products');
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

        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');

        });

        Schema::create('cart_products', function (Blueprint $table) {
            $table->id();
            $table->integer('cart_id');
            $table->integer('product_id');
            $table->integer('quantity');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cart_id')->references('id')->on('carts');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }


    public function down()
    {
        Schema::dropIfExists('order_products');
        Schema::dropIfExists('cart_products');
        Schema::dropIfExists('product_prices');
        Schema::dropIfExists('carts');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('users');
        Schema::dropIfExists('products');
        Schema::dropIfExists('genres');
        Schema::dropIfExists('authors');
    }
}
