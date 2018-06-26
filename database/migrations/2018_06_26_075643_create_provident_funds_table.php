<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidentFundsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('provident_funds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_id');
            $table->integer('employee_contribution');
            $table->integer('company_contribution');
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
        Schema::dropIfExists('provident_funds');
    }

}
