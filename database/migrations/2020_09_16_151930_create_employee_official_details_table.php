<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeOfficialDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_official_details', function (Blueprint $table) {
            $table->bigIncrements('emp_id')->unsigned();;
            $table->integer('emp_salary')->nullable();
            $table->string('emp_department')->nullable();
            $table->string('emp_designation')->nullable();
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
        Schema::dropIfExists('emp_official_details');
    }
}
