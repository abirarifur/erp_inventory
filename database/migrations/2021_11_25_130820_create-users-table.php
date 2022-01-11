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
            // $table->string('user_code')->unique();
            // $table->string('role_id');
            // $table->foreign('role_id')->references('role_code')->on('roles');
            // $table->string('role_name');
            $table->string('firstName', 100)->nullable();
            $table->string('lastName', 100)->nullable();
            // $table->foreignId('country_id')->constrained();
            // $table->foreignId('state_id')->constrained();
            // $table->foreignId('city_id')->constrained();
            // $table->foreignId('company_id')->constrained();
            // $table->foreignId('warehouse_id')->constrained();
            // $table->foreignId('shop_id')->constrained();
            // $table->string('address');
            // $table->date('dob');
            // $table->string('images');
            $table->string('email', 100)->unique()->nullable();
            // $table->string('phone', 20)->unique()->nullable();
            // $table->string('mobile', 20)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            // $table->integer('created_by');
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
        Schema::dropIfExists('users');
    }
}
