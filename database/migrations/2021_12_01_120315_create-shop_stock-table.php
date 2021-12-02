<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_stock', function (Blueprint $table) {
            $table->id();
            $table->string('shop_stock_code')->unique();
            $table->string('lot_number')->nullable();
            $table->string('per_unit_price')->nullable();
            $table->float('qty')->nullable();
            $table->string('item_id')->nullable();
            $table->foreign('item_id')->references('item_code')->on('items');
            $table->string('unit_id');
            $table->foreign('unit_id')->references('unit_code')->on('units');
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
        Schema::dropIfExists('shop_stock');
    }
}
