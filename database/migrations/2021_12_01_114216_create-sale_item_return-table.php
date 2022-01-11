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
            $table->foreignId('sale_id')->constrained();
            $table->unsignedBigInteger('sale_return_id');
            $table->foreign('sale_return_id')->references('id')->on('sale_return');
            $table->string('return_status');
            $table->float('return_qty');
            $table->float('price_per_unit');
            $table->float('tax_amt')->nullable();
            $table->string('tax_type')->nullable();
            // $table->float('unit_discount_per')->nullable();
            $table->float('discount_amt')->nullable();
            $table->string('discount_type')->nullable();
            $table->float('discount_input')->nullable();
            $table->float('unit_total_cost')->nullable();
            $table->float('total_cost')->nullable();
            $table->unsignedBigInteger('tax_id');
            $table->foreign('tax_id')->references('id')->on('tax');
            $table->foreignId('item_id')->constrained();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('warehouse_id')->constrained();
            $table->foreignId('shop_id')->constrained();
            $table->integer('created_by');
            $table->string('system_ip')->nullable();
            $table->tinyInteger('status')->unsigned()->default(1);
            $table->timestamps();
            // $table->softDeletes();
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
