<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id')->select('id','country_name');
    }
}