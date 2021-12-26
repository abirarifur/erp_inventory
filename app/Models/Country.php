<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';
    // protected $guarded = [];
    protected $fillable = [
        'country_code',
        'country_name',
        'created_by',
        'system_ip',
        'status'
    ];
}
