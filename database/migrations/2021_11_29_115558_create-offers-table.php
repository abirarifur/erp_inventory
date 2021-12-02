<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('offer_code')->unique();
            $table->string('offer_name')->unique();
            $table->string('description')->nullable();
            $table->string('offer_type');
            $table->float('bill_amount');
            $table->float('price');
            $table->float('offer_amount');
            $table->float('sale_price');
            $table->string('start_date');
            $table->string('expire_date');
            $table->string('item_id');
            $table->foreign('item_id')->references('item_code')->on('items');
            $table->string('unit_id')->nullable();
            $table->foreign('unit_id')->references('unit_code')->on('units');
            $table->float('unit_amt');
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
        Schema::dropIfExists('offers');
    }
}
