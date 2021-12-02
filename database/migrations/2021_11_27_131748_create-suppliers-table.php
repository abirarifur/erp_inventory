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
            $table->string('country_id');
            $table->foreign('country_id')->references('country_code')->on('countries');
            $table->string('state_id');
            $table->foreign('state_id')->references('state_code')->on('states');
            $table->string('city_id');
            $table->foreign('city_id')->references('city_code')->on('cities');
            $table->string('address');
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
        Schema::dropIfExists('suppliers');
    }
}
