<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalePaymentReturnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_payment_return', function (Blueprint $table) {
            $table->id();
            $table->string('sale_payment_return_code')->unique();
            $table->string('sale_id');
            $table->foreign('sale_id')->references('sale_code')->on('sales');
            $table->string('sale_return_id');
            $table->foreign('sale_return_id')->references('sale_return_code')->on('sale_return');
            $table->string('payment_type');
            $table->float('payment_amt');
            $table->string('payment_note')->nullable();
            $table->date('payment_date');
            $table->float('change_return')->nullable();
            $table->string('shop_id');
            $table->foreign('shop_id')->references('shop_code')->on('shops');
            $table->string('warehouse_id');
            $table->foreign('warehouse_id')->references('warehouse_code')->on('warehouses');
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
        Schema::dropIfExists('sale_payment_return');
    }
}
