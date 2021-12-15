<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasePaymentReturn extends Model
{
    use HasFactory;
    protected $table = 'purchase_payment_return';
    protected $guarded = [];
}
