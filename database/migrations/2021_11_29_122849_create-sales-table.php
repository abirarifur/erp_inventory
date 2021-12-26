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
            $table->foreignId('offer_id')->constrained();
            $table->foreignId('item_id')->constrained();
            $table->unsignedBigInteger('tax_id');
            $table->foreign('tax_id')->references('id')->on('tax');
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('warehouse_id')->constrained();
            $table->foreignId('shop_id')->constrained();
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
