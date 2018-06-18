<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeMonthlyIncomes extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('employee_monthly_incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_id');
            $table->string('salary_id');
            $table->integer('amount');
            $table->string('month');
            $table->string('income_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('employee_monthly_incomes');
    }

}
