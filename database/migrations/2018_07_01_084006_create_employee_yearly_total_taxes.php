<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeYearlyTotalTaxes extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('employee_yearly_total_taxes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_id');
            $table->integer('income_tax_amount');
            $table->integer('income_tax_rebate');
            $table->integer('final_tax_amount');
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
        Schema::dropIfExists('employee_yearly_total_taxes');
    }

}
