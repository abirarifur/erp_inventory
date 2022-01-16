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