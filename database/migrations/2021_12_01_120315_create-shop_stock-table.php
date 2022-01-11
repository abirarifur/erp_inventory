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
            $table->foreignId('item_id')->constrained();
            $table->foreignId('unit_id')->constrained();
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
        Schema::dropIfExists('shop_stock');
    }
}
