<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAdminsTableAddIsSuper extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->boolean('is_super')->default(0);
            $table->boolean('is_enable')->default(1);
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
        Schema::table('admins', function (Blueprint $table) {
            //
        });
    }
}
