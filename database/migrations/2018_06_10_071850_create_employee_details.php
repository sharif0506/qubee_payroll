<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeDetails extends Migration {

    /**
     * Run the migrations.
     *  
     * @return void
     */
    public function up() {
        Schema::create('employee_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_id', 32);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('designation');
            $table->string('category')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('sub_department_id')->nullable();
            $table->date('date_of_birth');
            $table->date('date_of_join');
            $table->date('date_of_leave')->nullable();
            $table->string('grade')->nullable();
            $table->string('step')->nullable();
            $table->string('band')->nullable();
            $table->string('tin')->nullable();
            $table->string('level')->nullable();
            $table->string('address')->nullable();
            $table->string('tax_rule');
            $table->string('custom_field1')->nullable();
            $table->string('custom_field2')->nullable();
            $table->string('custom_field3')->nullable();
            $table->string('custom_field4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('employee_details');
    }

}
