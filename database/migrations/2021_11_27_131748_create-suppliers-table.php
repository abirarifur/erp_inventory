<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_code')->unique();
            $table->string('supplier_name')->unique();
            $table->string('email', 100)->unique()->nullable();
            $table->string('phone', 20)->unique()->nullable();
            $table->string('mobile', 20)->unique()->nullable();
            $table->string('gst_number')->nullable();
            $table->string('tax_number')->nullable();
            $table->float('opening_balance')->nullable();
            $table->float('purchase_due')->nullable();
            $table->float('purchase_return_due')->nullable();
            $table->string('address');
            $table->foreignId('country_id')->constrained();
            $table->foreignId('state_id')->constrained();
            $table->foreignId('city_id')->constrained();
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
        Schema::dropIfExists('suppliers');
    }
}
