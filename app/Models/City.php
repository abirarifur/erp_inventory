<?php

namespace App\Models;

use App\Models\State;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    // protected $guarded = [];
    protected $fillable = [
        'city_code',
        'city_name',
        'state_id',
        'country_id',
        'created_by',
        'system_ip',
        'status'
    ];
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id')->select('id','country_name');
    }
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id')->select('id','state_name');
    }
}
