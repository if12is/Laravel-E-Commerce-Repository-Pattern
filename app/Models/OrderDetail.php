<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
        'order_id',
        'product_color_size_id',
        'quantity',
        'price',
        'price_discount',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product_color_size()
    {
        return $this->belongsTo(ProductColorSize::class);
    }
}
