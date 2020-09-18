<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        Schema::create('employee_details', function (Blueprint $table) {
            $table->bigIncrements('emp_id')->unsigned();
            $table->string('emp_name');
            $table->integer('emp_age')->nullable();
            $table->string('emp_mobile')->unique()->nullable();
            $table->string('emp_email_id')->unique()->nullable();
            $table->tinyInteger('status')->default(0)->nullable();
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
        Schema::dropIfExists('employee_details');
    }
}
