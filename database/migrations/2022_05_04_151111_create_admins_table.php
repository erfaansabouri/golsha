<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->text('full_name')->nullable();
            $table->string('email', 100)->unique();
            $table->text('password');
			$table->rememberToken();
			$table->timestamps();
        });

        \App\Models\Admin::query()
            ->create([
                'full_name' => 'مدیریت گلشا',
                'email' => 'iman@golshateb.com',
                'password' => bcrypt('as12AS!@'),
                'is_super' => 1,
                'is_enable' => 1,
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
