<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('sale_code')->unique();
            $table->string('description')->nullable();

            $table->string('item_id');
            $table->foreign('item_id')->references('item_code')->on('items');
            $table->string('unit_id');
            $table->foreign('unit_id')->references('unit_code')->on('units');

            $table->float('unit_amount')->nullable();
            $table->float('discount_amount')->nullable();
            $table->float('price')->nullable();
            $table->float('sale_price')->nullable();
            $table->float('discount_price')->nullable();
            $table->string('company_id');
            $table->foreign('company_id')->references('company_code')->on('companies');
            $table->integer('created_by');
            $table->string('system_ip')->nullable();
            $table->tinyInteger('status')->unsigned()->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}
