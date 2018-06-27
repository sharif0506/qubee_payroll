<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYearlyTaxesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('employee_yearly_taxes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_id');
            $table->integer('salary_id');
            $table->integer('salary_amount');
            $table->integer('tax_exempted_amount');
            $table->integer('taxable_amount');
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
        Schema::dropIfExists('employee_yearly_taxes');
    }

}
