<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('warehouse_code')->unique();
            $table->string('warehouse_name')->unique();
            $table->string('email', 100)->unique()->nullable();
            $table->string('phone', 20)->unique()->nullable();
            $table->string('mobile', 20)->unique()->nullable();
            $table->string('country_id');
            $table->foreign('country_id')->references('country_code')->on('countries');
            $table->string('state_id');
            $table->foreign('state_id')->references('state_code')->on('states');
            $table->string('company_id');
            $table->foreign('company_id')->references('company_code')->on('companies');
            $table->string('city_id');
            $table->foreign('city_id')->references('city_code')->on('cities');
            $table->string('address');
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
        Schema::dropIfExists('warehouses');
    }
}
