<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_code')->unique();
            $table->string('role_id');
            $table->foreign('role_id')->references('role_code')->on('roles');
            $table->string('role_name');
            $table->string('firstName', 100)->nullable();
            $table->string('lastName', 100)->nullable();
            $table->string('country_id');
            $table->foreign('country_id')->references('country_code')->on('countries');
            $table->string('state_id');
            $table->foreign('state_id')->references('state_code')->on('states');
            $table->string('shop_id')->nullable();
            $table->foreign('shop_id')->references('shop_code')->on('shops');
            $table->string('warehouse_id')->nullable();
            $table->foreign('warehouse_id')->references('warehouse_code')->on('warehouses');
            $table->string('company_id');
            $table->foreign('company_id')->references('company_code')->on('companies');
            $table->string('city_id');
            $table->foreign('city_id')->references('city_code')->on('cities');
            $table->string('address');
            $table->date('dob');
            $table->string('images');
            $table->string('email', 100)->unique()->nullable();
            $table->string('phone', 20)->unique()->nullable();
            $table->string('mobile', 20)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
