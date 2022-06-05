<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('address_id')->nullable();
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->unsignedDouble('discount_percentage')->default(0);
            $table->unsignedDouble('discount_toman')->default(0);
            $table->text('delivery_type')->nullable();
            $table->unsignedDouble('delivery_amount')->default(0);
            $table->timestamps();
        });

        Schema::create('cart_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('count')->default(1);
            $table->unsignedDouble('product_original_price')->default(0);
            $table->unsignedDouble('product_purchase_price')->default(0);
            $table->unsignedDouble('total_original_price')->default(0);
            $table->unsignedDouble('total_purchase_price')->default(0);
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
        Schema::dropIfExists('carts');
    }
}
