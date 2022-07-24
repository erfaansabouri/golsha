<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBehtarinCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('behtarin_categories', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('image_name')->nullable();
            $table->timestamps();
        });

        Schema::create('behtarin_category_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('behtarin_category_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
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
        Schema::dropIfExists('behtarin_categories');
        Schema::dropIfExists('behtarin_category_products');
    }
}
