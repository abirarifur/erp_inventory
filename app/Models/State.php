<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $table = 'states';
    // protected $guarded = [];
    protected $fillable = [
        'state_code',
        'state_name',
        'country_id',
        'created_by',
        'system_ip',
        'status'
    ];
}
