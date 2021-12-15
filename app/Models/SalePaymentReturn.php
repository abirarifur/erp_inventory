<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalePaymentReturn extends Model
{
    use HasFactory;
    protected $table = 'sale_payment_return';
    protected $guarded = [];
}
