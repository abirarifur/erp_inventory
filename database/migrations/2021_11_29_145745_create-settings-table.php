<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('setting_code')->unique();
            $table->string('site_name')->unique();
            $table->string('logo')->nullable();
            $table->string('currency_payment')->nullable();
            $table->string('timezone')->nullable();
            $table->string('date_format')->nullable();
            $table->string('time_format')->nullable();
            $table->string('site_url')->nullable();
            $table->string('site_title')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('mate_des')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('currencysymbol_id')->nullable();
            $table->string('regno_key')->nullable();
            $table->string('copyright')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('analytic_code')->nullable();
            $table->string('fav_icon')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('change_return')->nullable();
            $table->string('purchase_code')->nullable();
            $table->string('sales_invoice_footer_text')->nullable();
            $table->string('sales_invoice_format_id')->nullable();
            $table->string('machine_id')->nullable();
            $table->string('round_off')->nullable();
            $table->string('show_upi_code')->nullable();
            $table->string('domain')->nullable();
            $table->string('currency_id');
            $table->foreign('currency_id')->references('currency_code')->on('currencies');
            $table->string('language_id');
            $table->foreign('language_id')->references('language_code')->on('languages');
            $table->string('company_id');
            $table->foreign('company_id')->references('company_code')->on('companies');
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
        Schema::dropIfExists('settings');
    }
}
