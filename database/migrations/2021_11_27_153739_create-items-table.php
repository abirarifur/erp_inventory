<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_code')->unique();
            $table->string('item_name')->unique();
            $table->string('sku')->nullable();
            $table->string('description')->nullable();
            $table->string('barcode')->unique();
            $table->string('lot_number')->nullable();
            $table->date('expire_date');
            $table->float('purchase_price');
            $table->float('price');
            $table->float('sale_price');
            $table->float('profit_margin');
            $table->string('item_images');
            $table->float('stock');
            $table->integer('alert_qty');
            $table->string('tax_type');
            $table->foreignId('category_id')->constrained();
            $table->foreignId('subcategory_id')->constrained();
            $table->foreignId('size_id')->constrained();
            $table->foreignId('color_id')->constrained();
            $table->unsignedBigInteger('tax_id');
            $table->foreign('tax_id')->references('id')->on('tax');
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('unit_id')->constrained();
            $table->foreignId('style_id')->constrained();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('warehouse_id')->constrained();
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
        Schema::dropIfExists('items');
    }
}
