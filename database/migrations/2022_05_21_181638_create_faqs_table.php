<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('faq_categories', function (Blueprint $table) {
			$table->id();
			$table->text('title')->nullable();
			$table->timestamps();
		});
		
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('faq_category_id')->nullable();
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
        Schema::dropIfExists('faq_categories');
        Schema::dropIfExists('faqs');
    }
}
