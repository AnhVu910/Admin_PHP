<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSold extends Model
{
    use HasFactory;
    protected $table = 'product_solds';
    protected $fillable = [
        'order_id', 'product_id', 'product_quantity'
    ];
}
