<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    // protected $guarded = [];
    protected $fillable = [
        'company_code',
        'company_name',
        'city_id',
        'state_id',
        'country_id',
        'phone',
        'mobile',
        'email',
        'address',
        'logo',
        'gst_no',
        'vat_no',
        'pan_no',
        'pan_no',
        'created_by',
        'system_ip',
        'status'
    ];
}


$table->string('company_code')->unique();
            $table->string('company_name')->unique();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('logo')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('vat_no')->nullable();
            $table->string('pan_no')->nullable();
            $table->foreignId('country_id')->constrained();
            $table->foreignId('state_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->integer('created_by');
            $table->string('system_ip')->nullable();
            $table->tinyInteger('status')->unsigned()->default(1);