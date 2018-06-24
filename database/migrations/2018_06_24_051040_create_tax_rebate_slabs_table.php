<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxRebateSlabsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tax_rebate_slabs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slab_order');
            $table->integer('amount');
            $table->integer('rebate_rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('tax_rebate_slabs');
    }

}
