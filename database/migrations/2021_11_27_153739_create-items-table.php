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
            $table->string('category_id');
            $table->foreign('category_id')->references('category_code')->on('categories');
            $table->string('subcategory_id');
            $table->foreign('subcategory_id')->references('subcategory_code')->on('subcategories');
            $table->string('size_id');
            $table->foreign('size_id')->references('size_code')->on('sizes');
            $table->string('color_id');
            $table->foreign('color_id')->references('color_code')->on('colors');
            $table->string('style_id');
            $table->foreign('style_id')->references('style_code')->on('styles');
            $table->string('unit_id');
            $table->foreign('unit_id')->references('unit_code')->on('units');
            $table->string('brand_id');
            $table->foreign('brand_id')->references('brand_code')->on('brands');
            $table->string('tax_id');
            $table->foreign('tax_id')->references('tax_code')->on('tax');
            $table->string('tax_type');
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
        Schema::dropIfExists('items');
    }
}
