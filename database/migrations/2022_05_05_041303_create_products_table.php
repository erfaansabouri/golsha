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
            $table->text('title')->nullable();
            $table->text('seller_name')->nullable();
            $table->text('ingredients')->nullable();
            $table->text('size')->nullable();
            $table->text('virtues')->nullable();
            $table->unsignedDouble('price')->nullable();
            $table->double('discount_percentage')->nullable();
            $table->timestamp('discount_started_at')->nullable();
            $table->timestamp('discount_ended_at')->nullable();
            $table->text('introduction')->nullable();
			$table->unsignedBigInteger('saved_count')->default(0);
			$table->unsignedBigInteger('view_count')->default(0);
			$table->boolean('show_under_slider')->default(0);
			$table->boolean('is_suggestion')->default(0);
			$table->timestamps();
        });

		Schema::create('categories', function (Blueprint $table) {
			$table->id();
			$table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('image_name')->nullable();
            $table->timestamps();
		});

		Schema::create('category_product', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('category_id');
			$table->unsignedBigInteger('product_id');
			$table->timestamps();
		});

		Schema::create('groups', function (Blueprint $table) {
			$table->id();
			$table->text('title')->nullable();
			$table->text('description')->nullable();
			$table->text('image_name')->nullable();
			$table->timestamps();
		});

		Schema::create('group_product', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('group_id');
			$table->unsignedBigInteger('product_id');
			$table->timestamps();
		});

		Schema::create('product_attributes', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('product_id');
			$table->text('key')->nullable();
			$table->text('value')->nullable();
			$table->timestamps();
		});

		Schema::create('product_faqs', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('product_id');
			$table->text('question')->nullable();
			$table->text('answer')->nullable();
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
