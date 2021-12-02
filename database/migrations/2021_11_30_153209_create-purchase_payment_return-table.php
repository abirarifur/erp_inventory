<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasePaymentReturnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_payment_return', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_payment_return_code')->unique();
            $table->string('payment_type');
            $table->float('payment_amt');
            $table->string('payment_note')->nullable();
            $table->date('payment_date');
            $table->string('purchase_return_id');
            $table->foreign('purchase_return_id')->references('purchase_return_code')->on('purchase_return');
            $table->string('purchase_id');
            $table->foreign('purchase_id')->references('purchase_code')->on('purchases');
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
        Schema::dropIfExists('purchase_payment_return');
    }
}
