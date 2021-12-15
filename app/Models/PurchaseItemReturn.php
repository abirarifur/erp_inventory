<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItemReturn extends Model
{
    use HasFactory;
    protected $table = 'purchase_item_return';
    protected $guarded = [];
}
