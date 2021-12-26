<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('sale_code')->unique();
            $table->string('description')->nullable();
            $table->float('unit_amount')->nullable();
            $table->float('discount_amount')->nullable();
            $table->float('price')->nullable();
            $table->float('sale_price')->nullable();
            $table->float('discount_price')->nullable();
            $table->foreignId('item_id')->constrained();
            $table->foreignId('unit_id')->constrained();
            $table->foreignId('company_id')->constrained();
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
        Schema::dropIfExists('discounts');
    }
}
