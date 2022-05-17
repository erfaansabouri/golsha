<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->text('first_name')->nullable();
            $table->text('last_name')->nullable();
            $table->string('phone_number',100)->unique();
            $table->timestamp('phone_number_verified_at')->nullable();
            $table->string('otp')->nullable();
            $table->timestamp('otp_expire_at')->nullable();
            $table->text('password')->nullable();
            $table->boolean('is_disable')->default(false);
            $table->string('sex',100)->nullable();
            $table->string('email',100)->nullable();
            $table->timestamp('birthday')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('receiver_name')->nullable();
            $table->text('phone_number')->nullable();
            $table->text('country')->nullable();
            $table->text('state')->nullable();
            $table->text('city')->nullable();
            $table->text('first_line')->nullable();
            $table->text('second_line')->nullable();
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
        Schema::dropIfExists('users');
    }
}
