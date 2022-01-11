<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasePaymentReturnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_payment_return', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_payment_return_code')->unique();
            $table->string('payment_type');
            $table->float('payment_amt');
            $table->string('payment_note')->nullable();
            $table->date('payment_date');
            $table->unsignedBigInteger('purchase_return_id');
            $table->foreign('purchase_return_id')->references('id')->on('purchase_return');
            $table->foreignId('purchase_id')->constrained();
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
        Schema::dropIfExists('purchase_payment_return');
    }
}
