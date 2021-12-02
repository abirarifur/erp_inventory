<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleItemReturnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_item_return', function (Blueprint $table) {
            $table->id();
            $table->string('sale_item_return_code')->unique();
            $table->string('sale_id');
            $table->foreign('sale_id')->references('sale_code')->on('sales');
            $table->string('sale_return_id');
            $table->foreign('sale_return_id')->references('sale_return_code')->on('sale_return');
            $table->string('return_status');
            $table->float('return_qty');
            $table->float('price_per_unit');
            $table->string('tax_id')->nullable();
            $table->foreign('tax_id')->references('tax_code')->on('tax');
            $table->float('tax_amt')->nullable();
            $table->string('tax_type')->nullable();
            // $table->float('unit_discount_per')->nullable();
            $table->float('discount_amt')->nullable();
            $table->string('discount_type')->nullable();
            $table->float('discount_input')->nullable();

            $table->float('unit_total_cost')->nullable();
            $table->float('total_cost')->nullable();
            $table->string('item_id')->nullable();
            $table->foreign('item_id')->references('item_code')->on('items');
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
        Schema::dropIfExists('sale_item_return');
    }
}
