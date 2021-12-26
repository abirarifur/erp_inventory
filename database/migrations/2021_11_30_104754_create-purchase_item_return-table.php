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
            $table->foreignId('purchase_id')->constrained();
            $table->unsignedBigInteger('purchase_return_id');
            $table->foreign('purchase_return_id')->references('id')->on('purchase_return');
            $table->string('return_status');
            $table->float('return_qty');
            $table->string('purchase_status');
            $table->float('purchase_qty');
            $table->float('price_per_unit');
            $table->unsignedBigInteger('tax_id');
            $table->foreign('tax_id')->references('id')->on('tax');
            $table->float('tax_amt')->nullable();
            $table->string('tax_type')->nullable();
            $table->float('unit_discount_per')->nullable();
            $table->float('discount_amt')->nullable();
            $table->float('unit_total_cost')->nullable();
            $table->float('profit_margin_per')->nullable();
            $table->float('unit_sales_price')->nullable();
            $table->float('total_cost')->nullable();
            $table->foreignId('item_id')->constrained();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('warehouse_id')->constrained();
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
