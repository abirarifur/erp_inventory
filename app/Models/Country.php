<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    // use HasFactory, SoftDeletes;
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
