<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_code')->unique();
            $table->string('purchase_status');
            $table->string('reference_no')->unique()->nullable();
            $table->float('other_charges_input')->nullable();
            $table->float('other_charges_amt')->nullable();
            $table->float('discount_to_all_type')->nullable();
            $table->float('discount_to_all_input')->nullable();
            $table->float('tot_discount_to_all_amt')->nullable();
            $table->float('subtotal');
            $table->float('grand_total');
            $table->float('round_off');
            $table->string('payment_status');
            $table->string('purchase_note')->nullable();
            $table->float('paid_amount');
            $table->string('tax_id')->nullable();
            $table->foreign('tax_id')->references('tax_code')->on('tax');
            $table->string('item_id')->nullable();
            $table->foreign('item_id')->references('item_code')->on('items');
            $table->string('supplier_id')->nullable();
            $table->foreign('supplier_id')->references('supplier_code')->on('suppliers');
            $table->string('company_id');
            $table->foreign('company_id')->references('company_code')->on('companies');
            $table->string('warehouse_id');
            $table->foreign('warehouse_id')->references('warehouse_code')->on('warehouses');
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
        Schema::dropIfExists('purchases');
    }
}
