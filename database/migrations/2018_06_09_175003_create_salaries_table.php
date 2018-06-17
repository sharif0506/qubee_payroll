<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalariesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('tax_limit1')->nullable();
            $table->string('tax_limit2')->nullable();
            $table->string('tax_limit3')->nullable();
            $table->string('condition');
            $table->string('salary_type'); //monthly or occasionally
            $table->string('custom_field1')->nullable();
            $table->string('custom_field2')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('salaries');
    }

}
