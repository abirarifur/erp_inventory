<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseItemReturnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_item_return', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_item_return_code')->unique();
            $table->string('purchase_id');
            $table->foreign('purchase_id')->references('purchase_code')->on('purchases');
            $table->string('purchase_return_id');
            $table->foreign('purchase_return_id')->references('purchase_return_code')->on('purchase_return');
            $table->string('return_status');
            $table->float('return_qty');
            $table->string('purchase_status');
            $table->float('purchase_qty');
            $table->float('price_per_unit');
            $table->string('tax_id')->nullable();
            $table->foreign('tax_id')->references('tax_code')->on('tax');
            $table->float('tax_amt')->nullable();
            $table->string('tax_type')->nullable();
            $table->float('unit_discount_per')->nullable();
            $table->float('discount_amt')->nullable();
            $table->float('unit_total_cost')->nullable();
            $table->float('profit_margin_per')->nullable();
            $table->float('unit_sales_price')->nullable();
            $table->float('total_cost')->nullable();
            $table->string('item_id')->nullable();
            $table->foreign('item_id')->references('item_code')->on('items');
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
        Schema::dropIfExists('purchase_item_return');
    }
}
