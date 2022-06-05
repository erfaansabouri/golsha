<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->text('unique_code')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->unsignedDouble('discount_percentage')->default(0);
            $table->unsignedDouble('discount_toman')->default(0);
            $table->text('status')->nullable();
            $table->text('delivery_type')->nullable();
            $table->unsignedDouble('delivery_amount')->default(0);
            $table->unsignedDouble('paid_amount')->default(0);
            $table->timestamp('paid_at')->nullable();
            $table->text('tracking_code')->nullable();
            $table->text('card_owner_name')->nullable();
            $table->text('card_number')->nullable();
            $table->text('bank_name')->nullable();
            $table->timestamps();
        });
        Schema::create('invoice_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id');
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
        Schema::dropIfExists('invoices');
    }
}
