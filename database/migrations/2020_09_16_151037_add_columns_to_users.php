<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('mobile')->unique()->nullable();
            $table->integer('role_id')->default(3);  //SuperAdmin -1 , Employee - 2 , User - 3
            $table->tinyInteger('status')->default(1)->nullable();
            $table->timestamp('login_date_time')->nullable();
            $table->timestamp('logout_date_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('mobile');
            $table->dropColumn('login_date_time');
            $table->dropColumn('logout_date_time');
        });
    }
}
