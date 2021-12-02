<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('sale_code')->unique();
            $table->string('sale_status');
            $table->string('reference_no')->unique();
            $table->string('lot_number')->unique();
            $table->float('other_charges_input')->nullable();
            $table->float('other_charges_amt')->nullable();
            $table->float('discount_to_all_type')->nullable();
            $table->float('discount_to_all_input')->nullable();
            $table->float('tot_discount_to_all_amt')->nullable();
            $table->float('subtotal');
            $table->float('grand_total');
            $table->float('round_off');
            $table->string('payment_status');
            $table->string('sale_note');
            $table->float('paid_amount');
            $table->string('offer_id')->nullable();
            $table->foreign('offer_id')->references('offer_code')->on('offers');
            $table->string('tax_id')->nullable();
            $table->foreign('tax_id')->references('tax_code')->on('tax');
            $table->string('item_id')->nullable();
            $table->foreign('item_id')->references('item_code')->on('items');
            $table->string('customer_id')->nullable();
            $table->foreign('customer_id')->references('customer_code')->on('customers');
            $table->string('shop_id')->nullable();
            $table->foreign('shop_id')->references('shop_code')->on('shops');
            $table->string('warehouse_id');
            $table->foreign('warehouse_id')->references('warehouse_code')->on('warehouses');
            $table->string('company_id');
            $table->foreign('company_id')->references('company_code')->on('companies');
            $table->integer('created_by');
            $table->integer('pos')->nullable();
            $table->integer('return_bit')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
